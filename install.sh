#!/usr/bin/env bash

wget -q -O - https://dl-ssl.google.com/linux/linux_signing_key.pub | sudo apt-key add -
sudo sh -c 'echo "deb [arch=amd64] http://dl.google.com/linux/chrome/deb/ stable main" >> /etc/apt/sources.list.d/google-chrome.list'

sudo apt-get update

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
sudo apt-get install google-chrome-stable -y
sudo apt-get install default-jre -y
sudo npm install selenium-standalone@latest -g
sudo selenium-standalone install

