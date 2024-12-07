php artisan make:migration create_products_table
php artisan migrate
php artisan migrate
php artisan route:cache
php artisan make:model Category -m
php artisan migrate
php artisan migrate:rollback
php artisan migrate
php artisan migrate
php artisan route:cache
php artisan migrate
php artisan make:model Category -m
php artisan migrate
php artisan make:model Product -m
php artisan migrate
php artisan make:model Cart -m
php artisan migrate
php artisan make:model CartItem -m
php artisan migrate
php artisan make:model Order -m
php artisan migrate
php artisan make:model PersInfo -m
php artisan migrate
php artisan make:controller CategoryController
php artisan make:controller CartController
php artisan make:controller CartItemController
php artisan make:controller OrderController
php artisan make:controller PersInfoController
php artisan route:cache
php artisan migrate
php artisan migrate:rollback
php artisan migrate
php artisan migrate:rollback --step=1
php artisan migrate:rollback --step=3
php artisan migrate
exit
php artisan route:cache
exit
php artisan route:cache
exit
