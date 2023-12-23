<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('anasayfa');
});
Route::get("dashboard", function () {
    return view("dashboard");
});


require __DIR__."/category.php";






