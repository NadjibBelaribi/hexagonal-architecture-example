#!/bin/bash

cd api
composer install
cd ../site
composer install
webpack
#compass watch --css-dir public/css sass/aboutus.scss
#compass watch --css-dir public/css sass/login.scss
#compass watch --css-dir public/css sass/todos.scss
cd ..
sudo docker-compose up
