Run this project using CMD

step 1 git clone 
https://github.com/kundan9298/fictivebox.git

step 2
composer update

step 3
rename the .env.example to .env file

step 4
php artisan migrate

step 5
php artisan db:seed --class=BookSeeder

step 6
php artisan key:genrate

step 7
php artisan serve
