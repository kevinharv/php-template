run: build
	docker compose up -d

build:
	docker compose build

clean:
	docker compose down