FROM php:7.2-apache

ADD ./public /var/www/html
ADD password.txt /var/www
