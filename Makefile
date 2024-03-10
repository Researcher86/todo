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

vendor-refresh:
	docker compose exec app sh -c "rm -rf vendor/ var/ && composer i --ansi"

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

bench:
	# https://pestphp.com/docs/stress-testing#content-the-stress-command
	docker compose exec app ./vendor/bin/pest stress http://localhost:8080/bench --concurrency=500
	#docker compose exec app ./vendor/bin/pest stress http://localhost:8080/tasks --concurrency=500