<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get("kategoriler/{category_id?}",[CategoryController::class,'list_categories'])
->name("get-all-categories");

// bir kategori görüntüle
Route::get('kategori/{id}',[CategoryController::class,"get_one_category"])
->name('get-one-category');

// bir kaegorinin güncelleme işlemi
Route::put('kategori/{id}',[CategoryController::class,'update_category'])
->name("update.category");

Route::post("kategoriler",[CategoryController::class,'create_category'])
->name("create-category");