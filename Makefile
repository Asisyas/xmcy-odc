DOCKER_COMP = docker compose

PHP_CONT = $(DOCKER_COMP) exec php
NODE_CONT = $(DOCKER_COMP) run node

NODE	 = $(NODE_CONT)
PHP      = $(PHP_CONT) php
COMPOSER = $(PHP_CONT) composer
SYMFONY  = $(PHP_CONT) bin/console
YARN	 = $(NODE_CONT) yarn

.DEFAULT_GOAL = help
.PHONY        : help build up start down logs sh composer vendor sf cc

help:
	@grep -E '(^[a-zA-Z0-9_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}{printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'

build: ## Pull and make docker images and compile application components
	@$(DOCKER_COMP) build --pull --no-cache

up: ## Run made application
	@$(DOCKER_COMP) up --detach

start: up ## Alias for `make up`

build-front: ## Make front
	@$(YARN) install
	@$(YARN) build

front-dev: ## Starting the frontend developer mode.
	@$(YARN) watch

yarn:
	@$(eval c ?=)
	@$(YARN) $(c)

down: ## Shutdown all containers
	@$(DOCKER_COMP) down --remove-orphans

logs: ## Listen to logs in php container
	@$(DOCKER_COMP) logs --tail=0 --follow

sh: ## Open bash terminal in the "php" node.
	@$(PHP_CONT) sh

composer: ## Run composer, pass the parameter "c=" to run a given command, example: make composer c='req symfony/orm-pack'
	@$(eval c ?=)
	@$(COMPOSER) $(c)

vendor: ## composer install dependencies
vendor: c=install --prefer-dist --no-dev --no-progress --no-scripts --no-interaction
vendor: composer

sf: ## List all Symfony commands or pass the parameter "c=" to run a given command, example: make sf c=about
	@$(eval c ?=)
	@$(SYMFONY) $(c)

cc: c=c:c ## Clear the cache
cc: sf
