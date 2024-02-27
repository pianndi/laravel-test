<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
  public static function index()
  {
    return view('categories', [
      'title' => 'Daftar Kategori',
      'data' => Category::all(),
    ]);
  }
  public static function show(Category $category)
  {
    return view('posts', [
      'title' => $category->name . ' Category',
      'page' => "Kategory $category->name",
      'data' => $category->posts->load(['category', 'author']),
    ]);
  }
}
