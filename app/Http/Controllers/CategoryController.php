<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Illuminate\Validation\Rule;
use App\Models\Property;

class CategoryController extends Controller
{

  public function list_categories($category_id = null)
  {

    $kategoriler = Category::where('category_id', $category_id)->get();

    $kategori = Category::find($category_id);

    return view(
      "categories.list-categories",
      [
        'categories' => $kategoriler,
        'category' => $kategori
      ]
    );
  }
  public function create_category(CategoryRequest $request)
  {

    Category::create($request->all());

    return back()->with([
      'message' => "Yeni kategori eklendi."
    ]);

  }

  public function get_one_category(int $id)
  {

    $kategori = Category::findOrFail($id);
    return view("categories.get-one-category", compact('kategori'));
  }

  // kategori guncelle
  public function update_category(CategoryRequest $request, int $category_id)
  {
    $category = Category::findOrFail($category_id);
    $category->category_name = $request->category_name;
    $category->save();
    return back()->with([
      'message' => "Kategori güncellendi."
    ]);

  }

  public function create_property(Request $request)
  {
    $rules = [
      'property_name' => ['required', 'max:100'],
      'category_id' => 'exists:App\Models\Category,id',
      'property_type' => Rule::in(['text', 'radio', 'enum'])
    ];

    $request->validate($rules);

    $property = new Property();
    $property->name = $request->property_name;
    $property->category_id = $request->category_id;
    $property->type = $request->category_type;
    $property->save();
    return back();

  }




}
