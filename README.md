# PHP Apache Template
This repository serves as a template for a PHP website running on an Apache webserver. The webserver has been containerized along with a MySQL server. The `src` directory contains the application code that is running on the webserver.

## Prerequisites
This application is built on containerization. While a working understanding of Docker and containerization is recommended, the heavy lifting for this application has already been done. This is a PHP application, thus requiring knowledge of modern PHP practices is recommended. Familiarity with the Apache configuration language and patterns may be required for advanced modification of this application stack. MySQL is used as the database management system (DBMS) in this project.

[Getting Started with Docker](https://docs.docker.com/get-started/)
[Getting Started with PHP](https://www.php.net/manual/en/getting-started.php)
[Apache Web Server Documentation](https://httpd.apache.org/docs/current/)
[MySQL Documentation](https://dev.mysql.com/doc/refman/8.0/en/)

## Deployment
The container image comes with a sample PHP + MySQL application for demonstration purposes. To deploy a different site, the image may be rebuilt using different source content, or the `/var/www/html` directory may be overwritten by a mount point via a container orchestration tool.

Follow the steps below to deploy the sample application:
1. Clone the repository (or just the `docker-compose.yml` file)
1. Create a `db.env` file with the same keys as `db.env.example` (fields detailed below)
1. Run `docker compose pull` to pull the images from their registries
1. Run `docker compose up` to start the application stack
1. Access the webapp at [https://localhost](https://localhost)

The database will go through initialization the first time through. This may take a few seconds.

*A Makefile is incldued for easy development.*

## Environment Variables

**db.env**

The sample application requires a `db.env` file in the root of the project for MySQL database configuration.

| Key | Description |
| --- | ----------- |
| MYSQL_ROOT_PASSWORD | `root` user account password |
| MYSQL_USER | Username for connecting to DB |
| MYSQL_PASSWORD | Password for connecting to specified user |
| MYSQL_DATABASE | Name for MySQL database that will be created during initialization |

## Development
For developing applications, the `dev-compose.yml` may be utilized for a faster dev experience. It mounts the `src/` directory into the `/var/www/html` directory in the Apache container, allowing saved changes to be instantly available on page reload. Ensure your `umask` value is set to allow global read & execute on files in `src/` or the server will not be allowed to serve them.

The `Makefile` automatically does a `chmod` on `src/` files and starts the compose stack.