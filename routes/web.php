<?php


use Illuminate\Support\Facades\Route;

use App\Http\Livewire\BotManController;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\DetailsComponent;
use \App\Http\Livewire\User\UserDashboardComponent;
use \App\Http\Livewire\Admin\AdminDashboardComponent;


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


Route::get('/',HomeComponent::class)->name('home.index');
Route::get('/shop',ShopComponent::class)->name('shop');
Route::get('/product/{slug}',DetailsComponent::class)->name('product.details');
Route::get('/cart',CartComponent::class)->name('shop.cart');
Route::get('/checkout',CheckoutComponent::class)->name('shop.checkout');



Route::middleware(['auth'])->group(function (){
   Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');
});


Route::middleware(['auth','authadmin'])->group(function (){
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
});

Route::match(['get','post'],'/botman',[BotManController::class,'handle'])->name('botman');




require __DIR__.'/auth.php';
