<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Product\Create as ProductCreate;
use App\Http\Livewire\Product\Index as ProductIndex;
use App\Http\Livewire\Product\Edit as ProductEdit;



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
    return redirect()->route("product-index");
});

Route::get("product/index", ProductIndex::class)->name('product-index');
Route::get("product/create", ProductCreate::class)->name('product-create');
Route::get('products/edit/{id}', ProductEdit::class)->name('product-edit');
