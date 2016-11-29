#!/usr/bin/env bash

#-----------------------------------------    Backend    -------------#

#       Install perl libs
sudo apt-get install autoconf build-essential -y
sudo cpan YAML:Tiny

#       Install mysql
sudo apt-get install mysql-server php-mysql -y

#       Install php libs
sudo apt-get install composer -y
sudo apt-get install php-mbstring -y
sudo apt-get install php-curl -y
composer install

#-----------------------------------------    Frontend   -------------#

#       Install assets
sudo apt-get install npm -y
sudo npm install bower -g
sudo ln -s /usr/bin/nodejs /usr/bin/node
bower install

#       Install sellenium
sudo npm install selenium-standalone@latest -g
sudo selenium-standalone install

