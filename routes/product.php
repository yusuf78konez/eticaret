<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::group(['prefix' => 'urunler'], function () {
    // get kaynak isteme
    Route::get('/', [ProductController::class, 'tum_urunler'])->name('tum.urunler');
    // yeni kaynak oluştur (create işlemleri)
    Route::post('/', [ProductController::class, 'olustur_urun'])->name('olustur.urun');

    // urun güncelle
    Route::put('/{product_id}',[ProductController::class,'guncelle_urun'])->name('guncelle.urun');
    // urun sil
    Route::delete('/{product_id}',[ProductController::class,'sil_urun'])->name('sil.urun');
    // bir urun getir
    Route::get('/{product_id}',[ProductController::class,'getir.urun'])->name('getir.urun');

    // product_properties tablosu işlemleri
    Route::post('/{product_id}/ozellik')->name('deger.olustur.ozellik');
    // ara tablo güncelleme işlemi
    Route::put('/{product_id}/ozellik/{property_id}')->name('deger.guncelle.ozellik');
    // ara tablo sil
    Route::delete('/{product_id}/ozellik/{property_id}')->name('deger.sil.ozellik');

//....urunler/2/ozellik/4
});