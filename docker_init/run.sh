#!/bin/sh

apt update
apt install php-mbstring -y
a2enmod rewrite
service apache2 restart

tail -f /dev/null

