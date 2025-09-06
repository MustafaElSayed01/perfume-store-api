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


// View Tables
Route::apiResource('users', UserController::class);
Route::get('user-details/{user}', [UserController::class, 'details'])->name('users.details');
Route::get('user-addresses/{user}', [UserController::class, 'addresses'])->name('users.addresses');

Route::apiResource('user-types', UserTypeController::class);
Route::get('user-type-details/{userType}', [UserTypeController::class, 'details'])->name('user-types.details');

Route::apiResource('permissions', PermissionController::class);
Route::get('permission-details/{permission}', [PermissionController::class, 'details'])->name('permissions.details');

Route::apiResource('role-permissions', RolePermissionController::class);
Route::get('role-permission-details/{rolePermission}', [RolePermissionController::class, 'details'])->name('role-permissions.details');

Route::apiResource('product-types', ProductTypeController::class);
Route::get('product-type-details/{productType}', [ProductTypeController::class, 'details'])->name('product-types.details');

Route::apiResource('products', ProductController::class);

Route::apiResource('addresses', AddressController::class);

Route::apiResource('carts', CartController::class);
Route::get('cart-details/{cart}', [CartController::class, 'details'])->name('carts.details');

Route::apiResource('cart-items', CartItemController::class);

Route::apiResource('orders', OrderController::class);
Route::get('order-details/{order}', [OrderController::class, 'details'])->name('orders.details');

Route::apiResource('order-items', OrderItemController::class);




// Users
Route::apiResource('users', UserController::class);
Route::prefix('users')->group(function () {
    Route::get('{user}/details', 'details');
    Route::get('{user}/addresses', 'addresses');
});

// User Types
Route::apiResource('user-types', UserTypeController::class);
Route::prefix('user-types')->group(function () {
    Route::get('{userType}/details', 'details');
});

// Permissions
Route::apiResource('permissions', PermissionController::class);
Route::prefix('permissions')->group(function () {
    Route::get('{permission}/details', 'details');
});

// Role Permissions
Route::apiResource('role-permissions', RolePermissionController::class);
Route::prefix('role-permissions')->group(function () {
    Route::get('{rolePermission}/details', 'details');
});

// Product Types
Route::apiResource('product-types', ProductTypeController::class);
Route::prefix('product-types')->group(function () {
    Route::get('{productType}/details', 'details');
});

// Products
Route::apiResource('products', ProductController::class);

// Addresses
Route::apiResource('addresses', AddressController::class);

// Carts
Route::apiResource('carts', CartController::class);
Route::prefix('carts')->group(function () {
    Route::get('{cart}/details', 'details');
});

// Cart Items
Route::apiResource('cart-items', CartItemController::class);

// Orders
Route::apiResource('orders', OrderController::class);
Route::prefix('orders')->group(function () {
    Route::get('{order}/details', 'details');
});

// Order Items
Route::apiResource('order-items', OrderItemController::class);


// Authenticated User
Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
});
