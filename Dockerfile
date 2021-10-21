FROM debian:buster

RUN apt update 
RUN apt install -y apache2 default-mysql-client php php-gd php-zip php-xml php-mysql php-mbstring

