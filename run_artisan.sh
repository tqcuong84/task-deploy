cd /var/www/task-app2;
php artisan config:clear;
php artisan cache:clear; 
php artisan migrate --force;
exit;