.PHONY: build

.DEFAULT_GOAL := help

#Green color:  \033[0;32m     text      \033[0m
#Orange color: \033[0;33m     text      \033[0m

build: ## Install packages
	@echo "\033[0;32m1. Copying .env file... \033[0m"
	@docker-compose exec app cp .env.example .env
	@echo ""
	@echo "\033[0;32m2. Composer install on broker app... \033[0m"
	@docker-compose exec app composer install
	@echo ""
	@echo "\033[0;32m3. Setup pre-commit hook... \033[0m"
	@docker-compose exec app cp git-hooks/pre-commit.sh .git/hooks/pre-commit
	@docker-compose exec app chmod +x .git/hooks/pre-commit
	@echo "\033[0;32m4. Generate app key... \033[0m"
	@docker-compose exec app php artisan key:generate
	@echo "\033[0;32m5. Run migration... \033[0m"
	@docker-compose exec app php artisan migrate:fresh

run_code_sniffer:
	@echo "\033[0;32m1. Running PHP CodeSniffer... \033[0m"
	@echo ""
	@docker-compose exec -T app ./vendor/bin/phpcs --standard="./phpcs.xml"
	@echo ""

check: run_code_sniffer ## Run all checks

cs_fix: ## Fix code style
	@echo "\033[0;33mPLEASE COMMIT ALL YOUR CODE BEFORE YOU RUN THIS FIXING TOOLS!\033[0m";
	@echo "\033[0;33mARE YOU SURE YOU WANT TO CONTINUE? (y/n): \033[0m"; \
	read CONFIRM; \
	[ $$CONFIRM = "y" ] || (echo "\033[0;33mExiting... \033[0m"; echo ""; exit 1;)
	@echo "\033[0;32m1. Running PHP CodeSniffer auto fixer... \033[0m"
	@echo ""
	docker-compose exec -T app ./vendor/bin/phpcbf --standard="./phpcs.xml"
	@echo ""

help:
	@echo ''
	@printf ' \xE2\x96\xB7 '
	@echo 'AVAILABLE COMMANDS:'
	@echo ''
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'
	@echo ''
