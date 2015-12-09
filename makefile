test: phpunit-dev phpcs

build: phpunit-report phpcs

phpunit-dev:
	vendor/bin/phpunit

phpunit-report:
	vendor/bin/phpunit -c phpunit.xml.report

phpcbf:
	vendor/bin/phpcbf -p --standard=PSR2 src tests

phpcs:
	vendor/bin/phpcs -p --standard=PSR2 src tests

phpmd:
	vendor/bin/phpmd src text cleancode,codesize,controversial,design,naming,unusedcode