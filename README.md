To Run The Backend You Need To Do The Following Steps:

1) Clone the backend using `git clone https://github.com/omarchouman/erp-backend.git`
2) cd into the project and type `composer install`
3) Open it with the code editor and copy the content of .env.example into a new .env file
4) Fill the .env  file with your database info
5) Run  `php artisan key:generate` to generate a new key and then run `php artisan JWT:secret` and finally run `php artisan migrate`
6) After all the tables are migrated successfully into the database you can run `php artisan db:seed`  
7) The final thing  you need to do is starting the server using `php artisan serve`
