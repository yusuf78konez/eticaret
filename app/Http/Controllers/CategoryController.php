<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategoryController extends Controller
{
    
    public function list_categories($category_id=null){

        $kategoriler=Category::where('category_id',$category_id)->get();

        $kategori=Category::find($category_id);

        return view("categories.list-categories",
        ['categories'=>$kategoriler,
          'category'=> $kategori]);
    }
    public function create_category(CategoryRequest $request){
       
        Category::create($request->all());
        
        return back()->with([
          'message'=>"Yeni kategori eklendi."
        ]);

    }

    public function get_one_category(int $id){


      $kategori=Category::findOrFail($id);
      return view("categories.get-one-category",compact('kategori'));
    }

}
