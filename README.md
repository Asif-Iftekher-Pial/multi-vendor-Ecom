1.Run git clone 
2.Run composer install
3.Run cp .env.example .env Run composer dumpautoload comment out all the app service providers code in boot method before migrate
 4.Run php artisan key:generate 
 5.Run php artisan migrate 
 6.Run php artisan serve 
 7.Go to link localhost:8000