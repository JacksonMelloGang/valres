@echo off

git init
git remote add origin http://github.com/JacksonMellogang/valres
git pull origin main

composer install
npm install


copy .env.example .env
php artisan migrate
php artisan db:seed

php artisan serve