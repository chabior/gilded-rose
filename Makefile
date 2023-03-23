.PHONY: default
default:
	make build

.PHONY: build
build: #Build container
	docker-compose build --build-arg USER_ID=`id -u` --build-arg GROUP_ID=`id -g`
	docker-compose run --rm php composer install

.PHONY: lint
lint:
	docker-compose run --rm php composer lint

.PHONY: tests
tests:
	docker-compose run --rm php composer tests