<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/models_init', function () {
    $models = [
        'User',
        'UserType',
        'Permission',
        'RolePermission',
        'ProductType',
        'Product',
        'Address',
        'Cart',
        'CartItem',
        'Order',
        'OrderItem',
    ];

    foreach ($models as $model) {
        Artisan::call('make:model', ['name' => $model, '-a' => true]);

        // Hold the loop for 1 second
        sleep(1);
    }
});

Route::get('/resources_init', function () {

    $models = [
        'User',
        'UserType',
        'Permission',
        'RolePermission',
        'ProductType',
        'Product',
        'Address',
        'Cart',
        'CartItem',
        'Order',
        'OrderItem',
    ];

    foreach ($models as $model) {
        Artisan::call('make:resource', ['name' => "{$model}Resource"]);
        Artisan::call('make:resource', ['name' => "{$model}Collection"]);
    }
});
