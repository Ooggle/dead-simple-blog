#!/bin/sh

a2enmod rewrite
service apache2 restart

tail -f /dev/null

