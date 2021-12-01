cd /var/www/task-app2;
php artisan cache:clear;
php artisan config:clear;
php artisan key:generate;
php artisan migrate --force;
exit;