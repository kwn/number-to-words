test: phpunit phpcs

build: phpunit-coverage phpcs

phpunit:
	vendor/bin/phpunit --no-coverage

phpunit-coverage:
	vendor/bin/phpunit

phpcbf:
	vendor/bin/phpcbf -p --encoding=utf-8 --standard=PSR2 --ignore=src/Legacy/Numbers/Words/* src

phpcs:
	vendor/bin/phpcs -p --encoding=utf-8 --standard=PSR2 --ignore=src/Legacy/Numbers/Words/* src

phpmd:
	vendor/bin/phpmd src text cleancode,codesize,controversial,design,naming,unusedcode
