FROM debian:12 as ssl

RUN apt-get update && \
    apt-get install -y openssl && \
    rm -rf /var/lib/apt/lists/*

# Generate a self-signed SSL certificate
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/apache-selfsigned.key -out /etc/ssl/certs/apache-selfsigned.crt \
    -subj "/C=US/ST=TX/L=Dallas/O=Harvey/OU=Development/CN=localhost"

FROM debian:12 as runner

# Install Apache, PHP, and SSL utilities
ARG DEBIAN_FRONTEND=noninteractive
RUN apt-get update && \
    apt-get install -y curl apache2 php php-mysql libapache2-mod-php && \
    rm -rf /var/lib/apt/lists/*

# Copy site files over
COPY src/ /var/www/html/
RUN chmod -R 755 /var/www/html/
RUN rm /var/www/html/index.html

# Copy SSL certs
COPY --from=ssl /etc/ssl/private/apache-selfsigned.key /etc/ssl/private/apache-selfsigned.key
COPY --from=ssl /etc/ssl/certs/apache-selfsigned.crt /etc/ssl/certs/apache-selfsigned.crt

# Copy config and enable ssl
COPY apache-config.conf /etc/apache2/sites-available/apache-config.conf
RUN a2enmod ssl && \
    a2ensite apache-config

COPY ["entrypoint.sh", "/entrypoint.sh"]
RUN chmod +x /entrypoint.sh

EXPOSE 80
EXPOSE 443

CMD ["/entrypoint.sh"]
