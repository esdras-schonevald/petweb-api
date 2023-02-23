# Makefile

.PHONY: help
.DEFAULT_GOAL := help

# List of make targets that should not be displayed in help output
IGNORED_MAKE_TARGETS := help

all: help

# Help target, display all make targets
help:
	@echo "Usage:"
	@echo "  make <target>"
	@echo ""
	@echo "Targets:"
	@printf "  \033[94m%-20s\033[37m %-30s\033[90m%-50s\033[0m\n" 'cache-clear' 'Clear cache' 'docker exec php ./bin/console cache-clear'
	@printf "  \033[94m%-20s\033[37m %-30s\033[90m%-50s\033[0m\n" 'composer-autoload' 'Generate autoload files' 'docker exec -it php composer dump-autoload'
	@printf "  \033[94m%-20s\033[37m %-30s\033[90m%-50s\033[0m\n" 'composer-install' 'Install composer dependences' 'docker exec -it php composer install'
	@printf "  \033[94m%-20s\033[37m %-30s\033[90m%-50s\033[0m\n" 'composer-require' 'Add composer dependence' 'docker exec -it php composer require'
	@printf "  \033[94m%-20s\033[37m %-30s\033[90m%-50s\033[0m\n" 'composer-require-dev' 'Add composer dependence' 'docker exec -it php composer require --dev'
	@printf "  \033[94m%-20s\033[37m %-30s\033[90m%-50s\033[0m\n" 'composer-update' 'Update composer dependences' 'docker exec -it php composer update'
	@printf "  \033[94m%-20s\033[37m %-30s\033[90m%-50s\033[0m\n" 'migrate' 'Run doctrine migrations' 'docker exec php ./bin/console doctrine:migrations:migrate --no-interaction'


# Run doctrine migrations
migrate:
	@echo "Running doctrine migrations"
	@docker exec php ./bin/console doctrine:migrations:migrate --no-interaction

# Clear cache
cache-clear:
	@echo "Clearing cache"
	@docker exec php ./bin/console cache:clear

# composer autoload
composer-autoload:
	@echo "Dumping autoload"
	@docker exec -it php composer dump-autoload

# composer install
composer-install:
	@docker exec -it php composer install

# composer update
composer-update:
	@docker exec -it php composer update

composer-require:
	@docker exec -it php composer require

composer-require-dev:
	@docker exec -it php composer require --dev