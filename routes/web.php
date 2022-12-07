<?php

use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\V1\Customer\CustomerController;
use App\Http\Controllers\V1\Customer\FeedbackController as CustomerFeedbackController;
use App\Http\Controllers\V1\Customer\OrderController as CustomerOrderController;
use App\Http\Controllers\V1\Customer\StarterController as CustomerStarterController;
use App\Http\Controllers\V1\Customer\TicketController as CustomerTicketController;
use App\Http\Controllers\V1\Panel\ClearingController;
use App\Http\Controllers\V1\Panel\ElementController;
use App\Http\Controllers\V1\Panel\Financial\Inventory\InventoryController;
use App\Http\Controllers\V1\Panel\User\LocationController;
use App\Http\Controllers\V1\Panel\OrderController;
use App\Http\Controllers\V1\Panel\StarterController;
use App\Http\Controllers\V1\Panel\TicketController;
use App\Http\Controllers\V1\Panel\Place\Country\CountryController;
use App\Http\Controllers\V1\Panel\FeedbackController;
use App\Http\Controllers\V1\Panel\Financial\Currency\CurrencyController;
use App\Http\Controllers\V1\Panel\Financial\Exchange\ExchangeController;
use App\Http\Controllers\V1\Panel\Opinion\ContactUs\ContactUsController;
use App\Http\Controllers\V1\Panel\User\UserController;
use App\Http\Controllers\V1\View\ViewController;
use Illuminate\Support\Facades\Auth;
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


Route::view('v', 'v1.view.pages.test');

Auth::routes();

//! auth route for google
Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('auth.google');
Route::get('auth/google/callback', [GoogleAuthController::class, 'callBack']);

//! Admin routes
Route::prefix('admin')
    ->middleware(['role:is_owner', 'auth'])
    ->group(function () {

    //? Profile
    Route::get('/settings', [UserController::class, 'show_profile'])->name('settings');;
    Route::put('/settings/profile/{user}', [UserController::class, 'update_profile'])->name('settings.profile');
    
    //? Currencies
    Route::resource('/define/currencies', CurrencyController::class)->except(['create', 'show', 'edit']);

    //? Exchanges
    Route::resource('/exchanges', ExchangeController::class)->except(['index', 'show', 'edit']);

    //? Inventories
    Route::get('/define/inventories', [InventoryController::class, 'index'])->name('inventories.index');
    Route::post('/define/inventories', [InventoryController::class, 'store'])->name('inventories.store');

    //? Users
    Route::resource('/users', UserController::class)->only(['index', 'destroy']);

    //? Locations
    Route::post('loacations/{user}', [LocationController::class, 'index'])->name('locations.index');

    //? Orders
    Route::resource('/orders', OrderController::class)->only(['index', 'destroy']);
    Route::post('/orders/accept/{order}', [OrderController::class, 'accept'])->name('orders.accept');
    
    //? Clearings
    Route::get('/clearing/create/{order}', [ClearingController::class, 'create'])->name('clearing.create');
    Route::post('clearing/store', [ClearingController::class, 'store'])->name('clearing.store');
    Route::put('clearing/update/{clearing}', [ClearingController::class, 'update'])->name('clearing.update');

    Route::get('/upload/image/{clearing}', [ClearingController::class, 'editUploadImages'])->name('image.create');
    Route::post('/upload/image/{clearing}', [ClearingController::class, 'uploadImages'])->name('image.store');

    //? Feedbacks
    Route::resource('/feedbacks', FeedbackController::class)->only(['index', 'destroy']);
    Route::put('/update/feedback/{feedback}', [FeedbackController::class, 'watch'])->name('feedbacks.watch');

    //? Starters
    Route::resource('/starters', StarterController::class)->only(['index']);
    Route::put('/close/ticket/{starter}', [StarterController::class, 'close'])->name('starters.close');

    //? Tickets
    Route::get('/create/ticket/{starter}', [TicketController::class, 'create'])->name('tickets.create');
    Route::post('/create/ticket/{starter}', [TicketController::class, 'store'])->name('tickets.store');

    //? Country
    Route::resource('/countries', CountryController::class);
    Route::put('/country/actvie/{country}', [CountryController::class, 'make_active'])->name('countries.active');

    //? Contact Uses
    Route::get('/contactUs', [ContactUsController::class, 'index'])->name('contactUs.index');
    Route::delete('/contactUs/{contactUs}', [ContactUsController::class, 'destroy'])->name('contactUs.destroy');

    //? Searches
    Route::get('/search/element', [ElementController::class, 'search'])->name('element.search');
    Route::get('/search/user', [UserController::class, 'search'])->name('user.search');
    Route::get('/search/order', [OrderController::class, 'search'])->name('order.search');
    Route::get('/search/start', [StarterController::class, 'search'])->name('starts.search');
});

//! Customer routes
Route::prefix('customer')->middleware('auth')->name('customer.')->group(function () {
    //? Profile
    Route::get('/home', [CustomerController::class, 'index'])->name('index');
    Route::put('/settings/profile/{user}', [CustomerController::class, 'update_profile'])->name('settings.profile');

    //? Orders
    Route::resource('/orders', CustomerOrderController::class)->only('index');
    
    //? Starters
    Route::resource('/starters', CustomerStarterController::class)->only(['index', 'store']);

    //? Tickets
    Route::get('/create/ticket/{starter}', [CustomerTicketController::class, 'create'])->name('tickets.create');
    Route::post('/create/ticket/{starter}', [CustomerTicketController::class, 'store'])->name('tickets.store');

    //? Feedbacks
    Route::resource('/feedbacks', CustomerFeedbackController::class)->only('store');
});

//! View Routes
Route::get('/', [ViewController::class, 'index'])->name('home');
Route::post('/customer/order/send', [ViewController::class, 'store'])->name('customer.orders.send');
Route::get('/customer/forms/{order}', [ViewController::class, 'createForms'])->name('customer.forms');
Route::post('/customer/forms/send', [ViewController::class, 'storeForm'])->name('customer.forms.send');
Route::post('/customer/contact/us/send', [ViewController::class, 'contactUs'])->name('customer.contactUs.send');

Route::view('/terms', 'v1.view.pages.terms')->name('terms');
Route::view('/aboutUs', 'v1.view.pages.aboutUs')->name('aboutUs');
Route::view('/contactUs', 'v1.view.pages.contactUs')->name('contactUs');

Route::get('/services/tether', [ViewController::class, 'tether'])->name('services.tether');
Route::get('/services/perfect/money', [ViewController::class, 'perfect'])->name('services.perfect');
Route::get('/feedbacks', [ViewController::class, 'feedbacks'])->name('feedbacks');
Route::get('test', [ViewController::class, 'email']);

Route::get('refresh-captcha', [ViewController::class, 'refreshCaptcha'])->name('refreshCaptcha');