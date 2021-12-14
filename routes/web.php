<?php

use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\V1\Customer\CustomerController;
use App\Http\Controllers\V1\Customer\OrderController as CustomerOrderController;
use App\Http\Controllers\V1\Customer\StarterController as CustomerStarterController;
use App\Http\Controllers\V1\Customer\TicketController as CustomerTicketController;
use App\Http\Controllers\V1\Panel\CalculatorController;
use App\Http\Controllers\V1\Panel\ClearingController;
use App\Http\Controllers\V1\Panel\ElementController;
use App\Http\Controllers\V1\Panel\FormController;
use App\Http\Controllers\V1\Panel\InventoryController;
use App\Http\Controllers\V1\Panel\LocationController;
use App\Http\Controllers\V1\Panel\OrderController;
use App\Http\Controllers\V1\Panel\StarterController;
use App\Http\Controllers\V1\Panel\TicketController;
use App\Http\Controllers\V1\Panel\ContactUsController;
use App\Http\Controllers\V1\Panel\UserController;
use App\Http\Controllers\V1\View\ViewController;
use App\Http\Livewire\View\Layouts\Perfect;
use App\Http\Livewire\View\Layouts\Tether;
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

Auth::routes();

//auth route for google
Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('auth.google');
Route::get('auth/google/callback', [GoogleAuthController::class, 'callBack']);

//template livewire components 

// Admin routes
Route::prefix('admin')
    ->middleware(['role:100e82ba-e1c0-4153-8633-e1bd228f7399', 'auth'])
    ->group(function () {

    Route::get('/settings', [UserController::class, 'show_profile'])->name('settings');;
    Route::put('/settings/profile/{user}', [UserController::class, 'update_profile'])->name('settings.profile');

    Route::put('/ticket/watched/{ticket}', [TicketController::class, 'watched'])->name('ticket.watched');

    Route::get('/define/currencies', [CalculatorController::class, 'index'])->name('calculators.index');
    Route::post('/define/currencies', [CalculatorController::class, 'store'])->name('calculators.store');
    Route::delete('/define/currencies/{calculator}', [CalculatorController::class, 'destroy'])->name('calculators.destroy');
    
    Route::get('/define/inventories', [InventoryController::class, 'index'])->name('inventories.index');
    Route::post('/define/inventories', [InventoryController::class, 'store'])->name('inventories.store');
    
    Route::post('/orders/accept/{order}', [OrderController::class, 'accept'])->name('orders.accept');
    
    Route::get('/clearing/create/{order}', [ClearingController::class, 'create'])->name('clearing.create');
    Route::post('clearing/store', [ClearingController::class, 'store'])->name('clearing.store');
    Route::get('/clearing/edit/{clearing}', [ClearingController::class, 'edit'])->name('clearing.edit');
    Route::put('clearing/update/{clearing}', [ClearingController::class, 'update'])->name('clearing.update');
    
    Route::get('/upload/image/{clearing}', [ClearingController::class, 'editUploadImages'])->name('image.create');
    Route::post('/upload/image/{clearing}', [ClearingController::class, 'uploadImages'])->name('image.store');
    // Route::put('clearing/update/{clearing}', [ClearingController::class, 'update'])->name('clearing.update');
    
    Route::get('/create/ticket/{starter}', [TicketController::class, 'create'])->name('tickets.create');
    Route::post('/create/ticket/{starter}', [TicketController::class, 'store'])->name('tickets.store');
    Route::put('/close/ticket/{starter}', [StarterController::class, 'close'])->name('starters.close');

    Route::post('loacations/{user}', [LocationController::class, 'index'])->name('locations.index');

    Route::get('/search/order', [OrderController::class, 'search'])->name('order.search');
    Route::get('/search/user', [UserController::class, 'search'])->name('user.search');
    Route::get('/search/element', [ElementController::class, 'search'])->name('element.search');
    Route::get('/search/start', [StarterController::class, 'search'])->name('starts.search');

    Route::get('/contactUses', [ContactUsController::class, 'index'])->name('contactUs.index');
    Route::delete('/contactUses/{contactUs}', [ContactUsController::class, 'destroy'])->name('contactUs.destroy');

    Route::resources([
        '/users' => UserController::class,
        '/orders' => OrderController::class,
        '/forms' => FormController::class,
        '/elements' => ElementController::class,
        '/starters' => StarterController::class,
    ]);
});

// Customer routes
Route::prefix('customer')->middleware('auth')->name('customer.')->group(function () {
    
    Route::get('/home', [CustomerController::class, 'index'])->name('index');
    Route::put('/settings/profile/{user}', [UserController::class, 'update_profile'])->name('settings.profile');
    Route::get('/create/ticket/{starter}', [CustomerTicketController::class, 'create'])->name('tickets.create');
    Route::post('/create/ticket/{starter}', [CustomerTicketController::class, 'store'])->name('tickets.store');

    Route::resources([
        // '/tickets' => CustomerTicketController::class,
        '/orders' => CustomerOrderController::class,
        '/starters' => CustomerStarterController::class,
    ]);

});

//View Routes
    
Route::get('/', [ViewController::class, 'index'])->name('home');
Route::post('/customer/order/send', [ViewController::class, 'store'])->name('customer.orders.send');
Route::get('/customer/forms', [ViewController::class, 'createForms'])->name('customer.forms');
Route::post('/customer/forms/send', [ViewController::class, 'storeForm'])->name('customer.forms.send');
Route::post('/customer/contact/us/send', [ViewController::class, 'contacUs'])->name('customer.contactUs.send');

Route::view('/terms', '/v1/view/layouts/term')->name('terms');
Route::view('/aboutUs', '/v1/view/layouts/aboutUs')->name('aboutUs');
Route::view('/contactUs', '/v1/view/layouts/contactUs')->name('contactUs');
Route::get('/services/tether', [ViewController::class, 'tether'])->name('services.tether');
Route::get('/services/perfect/money', [ViewController::class, 'perfect'])->name('services.perfect');
// Route::get('test/email', [ViewController::class, 'email']);

Route::get('refresh-captcha', [ViewController::class, 'refreshCaptcha'])->name('refreshCaptcha');
// Route::view('test', '/index');
