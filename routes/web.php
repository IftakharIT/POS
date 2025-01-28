<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InvoiceController;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy')->middleware('auth');
});

require __DIR__.'/auth.php';

Route::prefix('categories')->group(function () {
    Route::get('/', [CategoriesController::class, 'index'])->name('categories.index')->middleware('auth');
    Route::get('/create', [CategoriesController::class, 'create'])->name('categories.create')->middleware('auth');
    Route::post('/', [CategoriesController::class, 'store'])->name('categories.store')->middleware('auth');
    Route::get('/{id}/edit', [CategoriesController::class, 'edit'])->name('categories.edit')->middleware('auth');
    Route::put('/{id}', [CategoriesController::class, 'update'])->name('categories.update')->middleware('auth');
    Route::delete('/{id}', [CategoriesController::class, 'destroy'])->name('categories.destroy')->middleware('auth');
});

Route::prefix('customers')->group(function () {
    Route::get('/', [CustomersController::class, 'index'])->name('customers.index')->middleware('auth');
    Route::get('/create', [CustomersController::class, 'create'])->name('customers.create')->middleware('auth');
    Route::post('/', [CustomersController::class, 'store'])->name('customers.store')->middleware('auth');
    Route::get('/{id}/edit', [CustomersController::class, 'edit'])->name('customers.edit')->middleware('auth');
    Route::put('/{id}', [CustomersController::class, 'update'])->name('customers.update')->middleware('auth');
    Route::delete('/{id}', [CustomersController::class, 'destroy'])->name('customers.destroy')->middleware('auth');
});

Route::resource('products', ProductController::class);

Route::resource('invoices', InvoiceController::class);

Route::get('invoices/{invoice}/print', [InvoiceController::class, 'print'])->name('invoices.print');
Route::get('invoices/{invoice}/download', [InvoiceController::class, 'download'])->name('invoices.download');
Route::get('invoices/{invoice}/edit', [InvoiceController::class, 'edit'])->name('invoices.edit');
Route::delete('invoices/{invoice}', [InvoiceController::class, 'destroy'])->name('invoices.destroy');


