cd /var/www/task-app2;
php artisan migrate --force;
php artisan key:generate;
exit;