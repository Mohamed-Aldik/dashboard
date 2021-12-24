<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\AddProductComponent;
use App\Http\Livewire\EditProductComponent;
use App\Http\Livewire\ShowProductComponent;
use App\Http\Livewire\SettingsComponent;

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


Route::get('/add-product', AddProductComponent::class)->name('add.product');
Route::get('/show-product', ShowProductComponent::class)->name('show.product');
Route::get('/edit-product/{id}', EditProductComponent::class)->name('edit.product');
Route::get('/edit-product', SettingsComponent::class)->name('settings');
Route::get('/', ShowProductComponent::class);