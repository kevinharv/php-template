run: build
	chmod 755 -R src/
	docker compose -f dev-compose.yml build
	docker compose -f dev-compose.yml up -d

build:
	docker compose -f dev-compose.yml build

stop:
	docker compose -f dev-compose.yml down

clean:
	docker compose -f dev-compose.yml down -v