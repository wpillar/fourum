install:
	@composer install --dev
	@php artisan install

tests:
	@./vendor/bin/phpunit

tests-coverage:
	@./vendor/bin/phpunit --coverage-text --coverage-html ./fourum/tests/report
