default:
	@printf "$$HELP"


# Docker commands
docker-build:
	docker-compose build -d

docker-up:
	docker-compose up -d

composer-install:
	docker exec -it kata-test bash -c "composer install --prefer-source --no-interaction"


docker-down:
	docker-compose down

docker-start:
	docker-compose up -d

docker-tests:
	@docker exec -it kata-test bash -c "./vendor/bin/phpunit"

docker-coverage:
	@docker exec -it kata-test bash -c "./vendor/bin/phpunit --coverage-text"

docker-ssh:
	@docker exec -it kata-test bash

docker-stop-all:
	@docker stop $(docker ps -a -q) 

docker-ip:
	docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' kata-test-db

define HELP
# Docker
	- default:
	- docker-build:
	- docker-stop
	- docker-down:
	- docker-start:
	- docker-tests:
	- docker-coverage:
	- docker-ssh:

endef

export HELP