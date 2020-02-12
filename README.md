# tender-api
 TENDER CRUD API


How to install:

Requirements:
1) Have xampp or something simillar installed with apache, mysql and PHP >7.2.
2) Have composer installed.

Installation:
1) Clone the git repo onto your machine.
2) Commands to run in the terminal in your repo directory:
- composer install
3) Copy the env.example file and rename it to .env.
4) In the .env file, change DB_DATABASE= to the database you're going to use.
5) Commands to run in the terminal in your repo directory:
- php artisan key:generate
- php artisan migrate
- composer dump-autoload
- php artisan db:seed
6) To serve the api, run this command in the terminal in your repo directory:
- php artisan serve
