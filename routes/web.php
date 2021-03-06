<?php

use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\CountDownTimerController;
use App\Http\Controllers\Backend\LogoController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//__frontend page routes start from here__//
Route::get('/',[FrontendController::class,'index']);
Route::get('/about-us',[FrontendController::class,'AboutUs'])->name('about.us');
Route::get('/contact-us',[FrontendController::class,'contactUs'])->name('contact.us');
Route::post('/contact-store',[FrontendController::class,'Store'])->name('contact.store');
Route::get('/shopping-cart',[FrontendController::class,'ShopingCart'])->name('shopping.cart');
Route::get('/product-list',[FrontendController::class,'ProductList'])->name('product.list');
Route::get('/product-category/{category_id}',[FrontendController::class,'CategoryWiseProduct'])->name('category.wise.product');
Route::get('/product-brand/{category_id}',[FrontendController::class,'BrandWiseProduct'])->name('brand.wise.product');
Route::get('/product-details-info/{slug}',[FrontendController::class,'ProductDetails'])->name('product.details.info');

//__frontend page routes end from here__//

//__backend page routes start from here__//
Route::group(['middleware' => ['test']], function () {
Route::prefix('users')->group(function () {
Route::get('/all',[UserController::class,'index'])->name('users.all');
Route::get('/create',[UserController::class,'create'])->name('users.create');
Route::post('/store',[UserController::class,'store'])->name('users.store');
Route::get('/edit/{id}',[UserController::class,'edit'])->name('users.edit');
Route::post('/update/{id}',[UserController::class,'update'])->name('users.update');
Route::get('/destroy/{id}',[UserController::class,'destroy'])->name('users.destroy');

});

// Profile Routes start from here
Route::prefix('profile')->group(function () {
Route::get('/user',[UserController::class,'index'])->name('profile.user');
Route::post('/store',[UserController::class,'store'])->name('profile.store');
Route::get('/edit',[UserController::class,'edit'])->name('profile.edit');
Route::post('/update',[UserController::class,'update'])->name('profile.update');
Route::get('/change-password',[ProfileController::class,'ChangePassword'])->name('change.password');
Route::post('/update-password',[ProfileController::class,'UpdatePassword'])->name('update.password');
});

//Count Down Timers routes start from here__//
Route::prefix('timers')->group(function () {
Route::get('/view',[CountDownTimerController::class,'index'])->name('timers.view');
Route::get('/create',[CountDownTimerController::class,'create'])->name('timers.create');
Route::post('/store',[CountDownTimerController::class,'store'])->name('timers.store');
Route::get('/edit/{id}',[CountDownTimerController::class,'edit'])->name('timers.edit');
Route::post('/update/{id}',[CountDownTimerController::class,'update'])->name('timers.update');
Route::get('/destroy/{id}',[CountDownTimerController::class,'destroy'])->name('timers.destroy');
});



//Logo routes start from here
Route::prefix('logos')->group(function () {
Route::get('/view',[LogoController::class,'index'])->name('logos.view');
Route::get('/create',[LogoController::class,'create'])->name('logos.create');
Route::post('/store',[LogoController::class,'store'])->name('logos.store');
Route::get('/edit/{id}',[LogoController::class,'edit'])->name('logos.edit');
Route::post('/update/{id}',[LogoController::class,'update'])->name('logos.update');
Route::get('/destroy/{id}',[LogoController::class,'destroy'])->name('logos.destroy');
});

//sliders routes start from here
Route::prefix('sliders')->group(function () {
Route::get('/view',[SliderController::class,'index'])->name('sliders.view');
Route::get('/create',[SliderController::class,'create'])->name('sliders.create');
Route::post('/store',[SliderController::class,'store'])->name('sliders.store');
Route::get('/edit/{id}',[SliderController::class,'edit'])->name('sliders.edit');
Route::post('/update/{id}',[SliderController::class,'update'])->name('sliders.update');
Route::get('/destroy/{id}',[SliderController::class,'destroy'])->name('sliders.destroy');
});


//contacts routes start from here
Route::prefix('contacts')->group(function () {
Route::get('/view',[ContactController::class,'index'])->name('contacts.view');
Route::get('/create',[ContactController::class,'create'])->name('contacts.create');
Route::post('/store',[ContactController::class,'store'])->name('contacts.store');
Route::get('/edit/{id}',[ContactController::class,'edit'])->name('contacts.edit');
Route::post('/update/{id}',[ContactController::class,'update'])->name('contacts.update');
Route::get('/destroy/{id}',[ContactController::class,'destroy'])->name('contacts.destroy');
});

//__about routes start from here__//
Route::prefix('about')->group(function () {
Route::get('/view',[AboutController::class,'index'])->name('about.view');
Route::get('/create',[AboutController::class,'create'])->name('about.create');
Route::post('/store',[AboutController::class,'store'])->name('about.store');
Route::get('/edit/{id}',[AboutController::class,'edit'])->name('about.edit');
Route::post('/update/{id}',[AboutController::class,'update'])->name('about.update');
Route::get('/destroy/{id}',[AboutController::class,'destroy'])->name('about.destroy');
});
//category routes start from here__//
Route::prefix('categories')->group(function () {
Route::get('/view',[CategoryController::class,'index'])->name('categories.view');
Route::get('/create',[CategoryController::class,'create'])->name('categories.create');
Route::post('/store',[CategoryController::class,'store'])->name('categories.store');
Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('categories.edit');
Route::post('/update/{id}',[CategoryController::class,'update'])->name('categories.update');
Route::get('/destroy/{id}',[CategoryController::class,'destroy'])->name('categories.destroy');
});
//Brand routes start from here__//
Route::prefix('brands')->group(function () {
Route::get('/view',[BrandController::class,'index'])->name('brands.view');
Route::get('/create',[BrandController::class,'create'])->name('brands.create');
Route::post('/store',[BrandController::class,'store'])->name('brands.store');
Route::get('/edit/{id}',[BrandController::class,'edit'])->name('brands.edit');
Route::post('/update/{id}',[BrandController::class,'update'])->name('brands.update');
Route::get('/destroy/{id}',[BrandController::class,'destroy'])->name('brands.destroy');
});
//Color routes start from here__//
Route::prefix('colors')->group(function () {
Route::get('/view',[ColorController::class,'index'])->name('colors.view');
Route::get('/create',[ColorController::class,'create'])->name('colors.create');
Route::post('/store',[ColorController::class,'store'])->name('colors.store');
Route::get('/edit/{id}',[ColorController::class,'edit'])->name('colors.edit');
Route::post('/update/{id}',[ColorController::class,'update'])->name('colors.update');
Route::get('/destroy/{id}',[ColorController::class,'destroy'])->name('colors.destroy');
});
//Size routes start from here__//
Route::prefix('sizes')->group(function () {
Route::get('/view',[SizeController::class,'index'])->name('sizes.view');
Route::get('/create',[SizeController::class,'create'])->name('sizes.create');
Route::post('/store',[SizeController::class,'store'])->name('sizes.store');
Route::get('/edit/{id}',[SizeController::class,'edit'])->name('sizes.edit');
Route::post('/update/{id}',[SizeController::class,'update'])->name('sizes.update');
Route::get('/destroy/{id}',[SizeController::class,'destroy'])->name('sizes.destroy');
});
//product routes start from here__//
Route::prefix('products')->group(function () {
Route::get('/view',[ProductController::class,'index'])->name('products.view');
Route::get('/create',[ProductController::class,'create'])->name('products.create');
Route::post('/store',[ProductController::class,'store'])->name('products.store');
Route::get('/edit/{id}',[ProductController::class,'edit'])->name('products.edit');
Route::get('/details/{slug}',[ProductController::class,'details'])->name('products.details.info');
Route::post('/updated/{id}',[ProductController::class,'update'])->name('products.update');
Route::get('/destroy/{id}',[ProductController::class,'destroy'])->name('products.destroy');
});



//User Email route
Route::prefix('email')->group(function () {
Route::get('user-email.view',[FrontendController::class,'UserEmailView'])->name('user-email.view');
Route::get('/user-email.destroy/{id}',[FrontendController::class,'destroy'])->name('user-email.destroy');
});
});
// group middleware End here
