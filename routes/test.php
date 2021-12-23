<?php

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

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Madnest\Madzipper\Facades\Madzipper;

Route::get('mail-test', function () {
    foreach (['taylor@example.com', 'dries@example.com'] as $recipient) {
        Mail::to($recipient)->send(new \App\Mail\OrderPlaced('hi'));
    }
});

Route::get('product-test', function () {
    return \App\CPU\ProductManager::get_latest_products(1, 1);
});

Route::get('category-products-test/{id}', function ($id) {
    return \App\CPU\CategoryManager::products($id);
});


Route::get('zip-extract', function () {
    Madzipper::make('test-zip.zip')->extractTo('public');
});

Route::get('/view-test',function (){
    view('welcome');
});
