build:
	docker compose build
up:
	docker compose up -d
down:
	docker compose down
stop:
	docker compose stop
logs:
	docker compose logs
restart:
	docker compose down -v
	docker compose up -d

php:
	docker compose exec app bash

route:
	docker compose exec app php app.php route:list

prototype-inject:
	docker compose exec app php app.php prototype:inject

migration-create:
	docker compose exec app php app.php cycle:migrate -n


migrate:
	docker compose exec app php app.php migrate -n



run:
	docker compose exec app ./rr serve

nodejs:
	docker compose run -it nodejs bash
