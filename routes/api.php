<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// // Users
// Route::apiResource('users', UserController::class);
// Route::prefix('users')->controller(UserController::class)->group(function () {
//     Route::get('{user}/details', 'details');
//     Route::get('{user}/addresses', 'addresses');
// });

// // User Types
// Route::apiResource('user-types', UserTypeController::class);
// Route::prefix('user-types')->controller(UserTypeController::class)->group(function () {
//     Route::get('{userType}/details', 'details');
// });

// // Permissions
// Route::apiResource('permissions', PermissionController::class);
// Route::prefix('permissions')->controller(PermissionController::class)->group(function () {
//     Route::get('{permission}/details', 'details');
// });

// // Role Permissions
// Route::apiResource('role-permissions', RolePermissionController::class);
// Route::prefix('role-permissions')->controller(RolePermissionController::class)->group(function () {
//     Route::get('{rolePermission}/details', 'details');
// });

// // Product Types
// Route::apiResource('product-types', ProductTypeController::class);
// Route::prefix('product-types')->controller(ProductTypeController::class)->group(function () {
//     Route::get('{productType}/details', 'details');
// });

// // Products
// Route::apiResource('products', ProductController::class);

// // Addresses
// Route::apiResource('addresses', AddressController::class);

// // Carts
// Route::apiResource('carts', CartController::class);
// Route::prefix('carts')->controller(CartController::class)->group(function () {
//     Route::get('{cart}/details', 'details');
// });

// // Cart Items
// Route::apiResource('cart-items', CartItemController::class);

// // Orders
// Route::apiResource('orders', OrderController::class);
// Route::prefix('orders')->controller(OrderController::class)->group(function () {
//     Route::get('{order}/details', 'details');
// });

// // Order Items
// Route::apiResource('order-items', OrderItemController::class);


// Authenticated User
Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
});


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResources(
        [
            'users' => UserController::class,
            'products' => ProductController::class,
            'orders' => OrderController::class,
            'carts' => CartController::class,
            'cart-items' => CartItemController::class,
            'order-items' => OrderItemController::class,
            'addresses' => AddressController::class,
            'user-types' => UserTypeController::class,
            'permissions' => PermissionController::class,
            'role-permissions' => RolePermissionController::class,
            'product-types' => ProductTypeController::class
        ]
    );
});