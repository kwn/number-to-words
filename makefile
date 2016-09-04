test: phpunit phpcs

build: phpunit-coverage phpcs

phpunit:
	vendor/bin/phpunit --no-coverage

phpunit-legacy:
	vendor/bin/phpunit --no-coverage --testsuite="Legacy number to string tests" --stop-on-error

phpunit-coverage:
	vendor/bin/phpunit

phpunit-legacy-coverage:
	vendor/bin/phpunit --testsuite="Legacy number to string tests" --stop-on-error

phpcbf:
	vendor/bin/phpcbf -p --standard=PSR2 src tests

phpcs:
	vendor/bin/phpcs -p --encoding=utf-8 --standard=PSR2 src tests

phpmd:
	vendor/bin/phpmd src text cleancode,codesize,controversial,design,naming,unusedcode
