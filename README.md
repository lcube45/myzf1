[![Codacy Badge](https://api.codacy.com/project/badge/Grade/55667bdfd66b4dea85e03024d850b2f1)](https://www.codacy.com/app/lcube45/myzf1?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=lcube45/myzf1&amp;utm_campaign=Badge_Grade)

[![CircleCI](https://circleci.com/gh/lcube45/myzf1.svg?style=svg)](https://circleci.com/gh/lcube45/myzf1)

# Utilisation

- composer install
- php -S localhost:8000 -t public\

# Utilisation PHPCS

- vendor/bin/phpcs --set-config installed_paths '../../wimg/php-compatibility'
- vendor/bin/phpcs --standard=PHPCompatibility --report=source --runtime-set testVersion 7.0 <path>
- vendor/bin/phpcs --standard=PHPCompatibility --report=summary --runtime-set testVersion 7.0 <path>
- vendor/bin/phpcs -s --report=summary <path>

# Utilisation PHP7CC

- vendor/bin/php7cc <path>

# Utilisation PHPUNIT

- vendor/bin/phpunit
- cd tests/
- ../vendor/bin/phpunit --list-groups
- ../vendor/bin/phpunit --groupe <package>