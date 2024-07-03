FROM php:7.4.26-apache

ADD ./public /var/www/html
ADD password.txt /var/www
