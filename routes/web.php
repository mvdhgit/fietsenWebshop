<?php
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

//homepage
Route::get('/', [PageController::class, 'home'])->name('pages.home');
Route::get('/product', [PageController::class, 'product'])->name('pages.product');
Route::get('/categories', [PageController::class, 'category'])->name('pages.categories');

//ProductController
Route::get('/product', [ProductController::class, 'index'])->name('products.index');    
Route::get('/products/fietsen', [ProductController::class, 'showFietsen'])->name('products.fietsen');
Route::get('/products/elektrischefietsen', [ProductController::class, 'showelektrischefietsen'])->name('products.elektrischefietsen');

//CartController
Route::get('/cart', [CartController::class, 'index'])->name('pages.cart');
Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/empty', [CartController::class, 'emptyCart'])->name('cart.empty');

//Ordercontroller
Route::post('/placeorder', [OrderController::class, 'placeOrder'])->name('order.place');
Route::get('/checkout-completed', [OrderController::class, 'orderCompleted'])->name('pages.succes');
Route::get('/order/{id}', [OrderController::class, 'showOrder'])->name('order.show');

//registration
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'create'])->name('register.post');

//Login
Route::get('/login', [LoginController::class, 'loginView'])->name('pages.viewlogin');
Route::post('/login', [LoginController::class, 'login'])->name('pages.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('pages.logout');
Route::post('check-login', [LoginController::class, 'checkLogin'])->name('pages.checkLogin');

//profiel
Route::get('/profile', [UserController::class, 'showProfile'])->name('pages.profile');
Route::get('/profile/change-password', [UserController::class, 'changePasswordForm'])->name('profile.changePassword');
Route::post('/profile/update-password', [UserController::class, 'updatePassword'])->name('profile.updatePassword');
Route::post('/profile/update-picture', [UserController::class, 'updatePicture'])->name('profile.updatePicture');

Route::middleware('auth')->group(function (){
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
    //profiel 
    //middleware cacheprevent
});

//toevoegen: user rollen, seeders
//role system toevoegen admin user
//seeders toevoegen voor users en producten