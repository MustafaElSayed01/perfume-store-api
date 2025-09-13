<?php

use App\Http\Controllers\{
    AuthController,
    AddressController,
    CartController,
    CartItemController,
    OrderController,
    OrderItemController,
    PermissionController,
    ProductController,
    ProductTypeController,
    RolePermissionController,
    UserController,
    UserTypeController
};
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
//     Route::get('{user_type}/details', 'details');
// });

// // Permissions
// Route::apiResource('permissions', PermissionController::class);
// Route::prefix('permissions')->controller(PermissionController::class)->group(function () {
//     Route::get('{permission}/details', 'details');
// });

// // Role Permissions
// Route::apiResource('role-permissions', RolePermissionController::class);
// Route::prefix('role-permissions')->controller(RolePermissionController::class)->group(function () {
//     Route::get('{role_permission}/details', 'details');
// });

// // Product Types
// Route::apiResource('product-types', ProductTypeController::class);
// Route::prefix('product-types')->controller(ProductTypeController::class)->group(function () {
//     Route::get('{product_type}/details', 'details');
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
    Route::prefix('login')->group(function () {
        Route::post('web', 'web_login');
        Route::post('mobile', 'mobile_login');
    });
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

    // Users
    Route::prefix('users')->controller(UserController::class)->group(function () {
        Route::get('{user}/details', 'details');
        Route::get('{user}/addresses', 'addresses');
    });

    // User Types
    Route::prefix('user-types')->controller(UserTypeController::class)->group(function () {
        Route::get('{user_type}/details', 'details');
    });

    // Permissions
    Route::prefix('permissions')->controller(PermissionController::class)->group(function () {
        Route::get('{permission}/details', 'details');
    });

    // Role Permissions
    Route::prefix('role-permissions')->controller(RolePermissionController::class)->group(function () {
        Route::get('{role_permission}/details', 'details');
    });

    // Product Types
    Route::prefix('product-types')->controller(ProductTypeController::class)->group(function () {
        Route::get('{product_type}/details', 'details');
    });

    // Carts
    Route::prefix('carts')->controller(CartController::class)->group(function () {
        Route::get('{cart}/details', 'details');
    });

    // Orders
    Route::prefix('orders')->controller(OrderController::class)->group(function () {
        Route::get('{order}/details', 'details');
    });

    // Auth
    Route::prefix('auth')->controller(AuthController::class)->group(function () {
        // All Sessions
        Route::prefix('sessions')->group(function () {
            Route::get('active', 'active_sessions');
            Route::get('current', 'current_session');
            Route::get('others', 'other_sessions');
            Route::get('/{id}/show', 'show_session');
        });

        // logout
        Route::prefix('logout')->group(function () {
            Route::post('all', 'logout_all');
            Route::post('current', 'logout_current');
            Route::post('others', 'logout_others');
            Route::post('session/{id}', 'logout_session');
        });
        // Profile

        Route::prefix('profile')->group(function () {
            Route::get('', 'show_profile');
            Route::put('', 'update_profile');
            Route::put('change-photo', 'change_photo');
        });

        // Change password
        Route::put('change-password', 'change_password');

    });

});