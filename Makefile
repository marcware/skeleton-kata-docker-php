default:
	@printf "$$HELP"

# Local commands
dependencies:
	composer install --prefer-source --no-interaction
.PHONY: tests
tests:
	./vendor/bin/phpunit
coverage:
	./vendor/bin/phpunit --coverage-text

# Docker commands
docker-build:
	docker build -t skeleton-kata-docker-php_webserver .
	@docker run -v $(shell pwd):/var/www/html skeleton-kata-docker-php_webserver make dependencies

docker-tests:
	@docker run -v $(shell pwd):/var/www/html skeleton-kata-docker-php_webserver make tests

docker-coverage:
	@docker run -v $(shell pwd):/var/www/html skeleton-kata-docker-php_webserver make coverage

define HELP
# Local commands
	- make dependencies\tInstall the dependencies using composer
	- make tests\t\tRun the tests
	- make coverage\t\tRun the code coverage
# Docker commands
	- make docker-build\tCreates a PHP image with xdebug and install the dependencies
	- make docker-tests\tRun the tests on docker
	- make docker-coverage\tRun the code coverage
 Please execute "make <command>". Example make help

endef

export HELP