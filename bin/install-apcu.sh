#!/bin/bash

phpenv config-add app/config/test/apc.ini

if [ "$TRAVIS_PHP_VERSION" < "5.5" ]
then
    phpenv config-add app/config/test/5.3.ini
    exit 0

fi

phpenv config-add app/config/test/5.5.ini

# this is helpful to compile extension
sudo apt-get install autoconf

# install this version
APCU=4.0.2

# compile manually, because `pecl install apcu-beta` keep asking questions
wget http://pecl.php.net/get/apcu-$APCU.tgz
tar zxvf apcu-$APCU.tgz
cd "apcu-${APCU}"
phpize && ./configure && make install && echo "Installed ext/apcu-${APCU}"