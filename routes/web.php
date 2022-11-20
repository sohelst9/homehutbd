<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ColorController;
use App\Http\Controllers\admin\CouponController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\Admin\ProductVariationController;
use App\Http\Controllers\admin\SizeController;
use App\Http\Controllers\admin\subCategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Auth::routes();
//frontend route
Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/subcategory/shop/{subcat_id}', [FrontendController::class, 'subcategory_shop'])->name('subcategory.shop');
Route::get('/category/shop/{cat_id}', [FrontendController::class, 'category_shop'])->name('category.shop');
Route::get('/shop/{product_id}', [FrontendController::class, 'single_Product'])->name('single.Product');
Route::post('/get-size', [FrontendController::class, 'get_size'])->name('get.size');
Route::post('/get-quantity', [FrontendController::class, 'get_quantity'])->name('get.quantity');

Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/insert', [CartController::class, 'insert'])->name('cart.insert');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::get('/cart/destroy/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::get('/cart/{coupon_code}', [CartController::class, 'index'])->name('cart');
    // checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/order', [CheckoutController::class, 'order'])->name('order');
    Route::get('/order/confirm', [CheckoutController::class, 'order_confirm'])->name('order.confirm');
    // ajax call
    Route::post('/district', [CheckoutController::class, 'district'])->name('district');
    Route::post('/sub_district', [CheckoutController::class, 'sub_district'])->name('sub_district');

    //manage customaer account--
    Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('user.dashboard');

    // SSLCOMMERZ Start
    Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
    Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

    Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
    Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

    Route::post('/success', [SslCommerzPaymentController::class, 'success']);
    Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
    Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

    Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
    //SSLCOMMERZ END

});
/*------------------admin route--------------*/
Route::prefix('admin')->group(function () {
    //admin login----
    Route::get('/login', [AdminController::class, 'index'])->name('admin.login');
    Route::post('/login/create', [AdminController::class, 'login'])->name('login.create');

    Route::middleware('admin')->group(function () {
        // admin register route----
        Route::get('/register', [AdminController::class, 'AdminRegister'])->name('admin.register');
        Route::post('/register/insert', [AdminController::class, 'AdminRegisterInsert'])->name('register.insert');

        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

        Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
        Route::post('/profile/update', [AdminController::class, 'profile_update'])->name('admin.profile.update');
        Route::get('/password/change', [AdminController::class, 'password_change'])->name('admin.change.password');
        Route::post('/password/update', [AdminController::class, 'password_update'])->name('admin.password.update');
        //banner---
        Route::resource('banner', BannerController::class);
        //category
        Route::resource('category', CategoryController::class);
        //subcategory
        Route::resource('subCategory', subCategoryController::class);
        //Brand
        Route::resource('brand', BrandController::class);
        //color
        Route::resource('color', ColorController::class);
        //color
        Route::resource('size', SizeController::class);
        // product
        Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/product/index', [ProductController::class, 'index'])->name('product.index');
        Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::get('/product/add-inventory/{product_id}', [ProductVariationController::class, 'add_inventory'])->name('product.inventory');
        Route::post('/productVariation/store', [ProductVariationController::class, 'variation_store'])->name('productVariation.store');
        Route::post('/product/update', [ProductController::class, 'update'])->name('product.update');
        Route::get('/galleryImage/{gallery_id}/delete', [ProductController::class, 'galleryImage_delete']);
        Route::delete('/product/destroy/{id}', [ProductController::class, 'destroy'])->name('product.delete');

        // coupon
        Route::resource('coupon', CouponController::class);
    });
});
//ajax route category select and auto subcategory show
Route::post('/getCategory', [ProductController::class, 'getCategorys']);

/*------------------admin route end--------------*/
