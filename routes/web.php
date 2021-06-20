<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [
    "uses"        => "App\Http\Controllers\NewShopController@index",
    "as"          => "/",
]);

Route::get('/category/product/{id}', [
    "uses"        => "App\Http\Controllers\NewShopController@categoryProduct",
    "as"          => "category-product",
]);


Route::get('/brand/product/{id}', [
    "uses"        => "App\Http\Controllers\NewShopController@brandProduct",
    "as"          => "brand-product",
]);


Route::get('/product-details/{id}', [
    "uses"        => "App\Http\Controllers\NewShopController@productDetails",
    "as"          => "product-details",
]);


Route::post('/cart/add', [
    "uses"        => "App\Http\Controllers\CartController@addToCart",
    "as"          => "add-to-cart",
]);

Route::get('/cart/show', [
    "uses"        => "App\Http\Controllers\CartController@showCart",
    "as"          => "show-cart",
]);

Route::get('/cart/delete/{rowId}', [
    "uses"        => "App\Http\Controllers\CartController@deleteCart",
    "as"          => "delete-cart-item",
]);

Route::post('/cart/update', [
    "uses"        => "App\Http\Controllers\CartController@updateCart",
    "as"          => "update-cart",
]);

Route::get('/checkout', [
    "uses"        => "App\Http\Controllers\CheckoutController@index",
    "as"          => "checkout",
]);

Route::post('/customer/registration', [
    "uses"        => "App\Http\Controllers\CheckoutController@customerSingUp",
    "as"          => "customer-sing-up",
]);

Route::post('/customer/customer/login', [
    "uses"        => "App\Http\Controllers\CheckoutController@customerLoginCheck",
    "as"          => "customer-login",
]);


Route::post('/customer/customer/logout', [
    "uses"        => "App\Http\Controllers\CheckoutController@customerLogout",
    "as"          => "customer-logout",
]);


Route::get('/customer/new/customer/login', [
    "uses"        => "App\Http\Controllers\CheckoutController@newCustomerLogin",
    "as"          => "new-customer-login",
]);

Route::get('/checkout/shipping', [
    "uses"        => "App\Http\Controllers\CheckoutController@shippingForm",
    "as"          => "checkout-shipping",
]);

Route::post('/shipping/save', [
    "uses"        => "App\Http\Controllers\CheckoutController@saveShippingInfo",
    "as"          => "new-shipping",
]);

Route::get('/checkout/payment', [
    "uses"        => "App\Http\Controllers\CheckoutController@paymentForm",
    "as"          => "checkout-payment",
]);

Route::post('/checkout/order', [
    "uses"        => "App\Http\Controllers\CheckoutController@newOrder",
    "as"          => "new-order",
]);

Route::get('/complete/order', [
    "uses"        => "App\Http\Controllers\CheckoutController@completeOrder",
    "as"          => "complete-order",
]);



Route::get('/mail-us', [
    "uses"        => "App\Http\Controllers\NewShopController@mailUs",
    "as"          => "/mail-us",
]);





//    Category Section

Route::get('/category/add', [
    "uses"        => "App\Http\Controllers\CategoryController@index",
    "as"          => "add-category",
]);

Route::post('/category/save', [
    "uses"        => "App\Http\Controllers\CategoryController@saveCategory",
    "as"          => "new-category",
]);


Route::get('/category/manage', [
    "uses"        => "App\Http\Controllers\CategoryController@manageCategory",
    "as"          => "manage-category",
]);

Route::get('/category/unpublished/{id}', [
    "uses"        => "App\Http\Controllers\CategoryController@unpublishedCategoryInfo",
    "as"          => "unpublished-category",
]);

Route::get('/category/published/{id}', [
    "uses"        => "App\Http\Controllers\CategoryController@publishedCategoryInfo",
    "as"          => "published-category",
]);

Route::get('/category/edit/{id}', [
    "uses"        => "App\Http\Controllers\CategoryController@editCategoryInfo",
    "as"          => "edit-category",
]);


Route::post('/category/update', [
    "uses"        => "App\Http\Controllers\CategoryController@updateCategoryInfo",
    "as"          => "update-category",
]);

Route::get('/category/delete/{id}', [
    "uses"        => "App\Http\Controllers\CategoryController@deleteCategoryInfo",
    "as"          => "delete-category",
]);


//    Brand section


Route::get('/brand/add', [
    "uses"        => "App\Http\Controllers\BrandController@index",
    "as"          => "add-brand",
]);

Route::post('/brand/save', [
    "uses"        => "App\Http\Controllers\BrandController@saveBrandInfo",
    "as"          => "new-brand",
]);

Route::get('/brand/manage', [
    "uses"        => "App\Http\Controllers\BrandController@manageBrandInfo",
    "as"          => "manage-brand",
]);

Route::get('/brand/unpublished/{id}', [
    "uses"        => "App\Http\Controllers\BrandController@unpublishedBrandInfo",
    "as"          => "unpublished-brand",
]);

Route::get('/brand/published/{id}', [
    "uses"        => "App\Http\Controllers\BrandController@publishedBrandInfo",
    "as"          => "published-brand",
]);

Route::get('/brand/edit/{id}', [
    "uses"        => "App\Http\Controllers\BrandController@editBrandInfo",
    "as"          => "edit-brand",
]);

Route::post('/brand/update', [
    "uses"        => "App\Http\Controllers\BrandController@updateBrandInfo",
    "as"          => "update-brand",
]);
Route::get('/brand/delete/{id}', [
    "uses"        => "App\Http\Controllers\BrandController@deleteBrandInfo",
    "as"          => "delete-brand",
]);


Route::middleware(['login'])->group(function () {
    Route::get('/product/add', [
        "uses"        => "App\Http\Controllers\ProductController@index",
        "as"          => "add-product",
    ]);

    Route::post('/product/save', [
        "uses"        => "App\Http\Controllers\ProductController@saveProduct",
        "as"          => "new-product",
    ]);

    Route::get('/product/manage', [
        "uses"        => "App\Http\Controllers\ProductController@manageProduct",
        "as"          => "manage-product",
    ]);

    Route::get('/product/unpublished/{id}', [
        "uses"        => "App\Http\Controllers\ProductController@unpublishedProductInfo",
        "as"          => "unpublished-product",
    ]);

    Route::get('/product/published/{id}', [
        "uses"        => "App\Http\Controllers\ProductController@publishedProductInfo",
        "as"          => "published-product",
    ]);

    Route::get('/product/viw/{id}', [
        "uses"        => "App\Http\Controllers\ProductController@viwProductInfoById",
        "as"          => "viw-product",
    ]);

    Route::get('/product/edit/{id}', [
        "uses"        => "App\Http\Controllers\ProductController@editProductInfo",
        "as"          => "edit-product",
    ]);

    Route::post('/product/update', [
        "uses"        => "App\Http\Controllers\ProductController@updateProductInfo",
        "as"          => "update-product",
    ]);


    Route::get('/product/delete/{id}', [
        "uses"        => "App\Http\Controllers\ProductController@deleteProductInfo",
        "as"          => "delete-product",
    ]);



    Route::get('/order/manage/order', [
        "uses"        => "App\Http\Controllers\OrderController@manageOrderInfo",
        "as"          => "manage-order",
    ]);

    Route::get('/order/viw-order-detail/{id}', [
        "uses"        => "App\Http\Controllers\OrderController@viwOrderDetail",
        "as"          => "viw-order-detail",
    ]);

    Route::get('/order/viw-order-invoice/{id}', [
        "uses"        => "App\Http\Controllers\OrderController@viwOrderInvoice",
        "as"          => "viw-order-invoice",
    ]);

    Route::get('/order/download-order-invoice/{id}', [
        "uses"        => "App\Http\Controllers\OrderController@downloadOrderInvoice",
        "as"          => "download-order-invoice",
    ]);

});














Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/registration', [
    "uses"        => "App\Http\Controllers\HomeController@registration",
    "as"          => "registration",
]);
