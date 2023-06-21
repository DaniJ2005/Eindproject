<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SellOrderController;
use App\Http\Controllers\BuyOrderController;
use App\Models\Product;
use App\Models\Supplier;



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
    return view('index');
});

Route::resource('sellorders', SellOrderController::class);

Route::get('sellorders/{sellOrderId}/products/create', [SellOrderController::class, 'createSellOrderProducts'])->name('sellorders.products.create');
Route::put('sellorders/{sellOrderId}/products/edit', [SellOrderController::class, 'editSellOrderProducts'])->name('sellorders.products.edit');
Route::post('sellorders/{sellorderId}/products',[SellOrderController::class, 'storeSellOrderProducts'])->name('sellorders.products.store');
Route::delete('sellorders/products/destroy/{productId}', [SellOrderController::class, 'deleteSellOrderProducts'])->name('sellorders.products.destroy');

Route::resource('buyorders', BuyOrderController::class);

Route::get('buyorders/{buyOrderId}/products/create', [BuyOrderController::class, 'createBuyOrderProducts'])->name('buyorders.products.create');
Route::put('buyorders/{buyOrderId}/products/edit', [BuyOrderController::class, 'editBuyOrderProducts'])->name('buyorders.products.edit');
Route::post('buyorders/{buyorderId}/products',[BuyOrderController::class, 'storeBuyOrderProducts'])->name('buyorders.products.store');
Route::delete('buyorders/products/destroy/{productId}', [BuyOrderController::class, 'deleteBuyOrderProducts'])->name('buyorders.products.destroy');


Route::resource('customers', CustomerController::class);
Route::resource('products', ProductController::class);
Route::resource('suppliers', SupplierController::class);



Route::get('/test', function(){
 
  $aProds = Supplier::all();

  var_dump($aProds);

});