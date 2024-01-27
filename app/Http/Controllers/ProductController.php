<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function tum_urunler()
    {
        $produtcs = Product::orderBy('id', 'desc')->paginate(5);

        return view('products.list-products', compact('produtcs'));
    }

    public function olutur_urun(ProductRequest $request)
    {
        Product::create($request->all());
        return back();
    }
}
