<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('dashboard.category.index', [
      'data' => Category::latest()->get(),
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('dashboard.category.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $data = $request->validate([
      'name' => 'required|min:3|max:255',
      'slug' => 'required|min:3|unique:categories',
    ]);

    Category::create($data);
    return redirect('/dashboard/category')->with(
      'status',
      'Berhasil menambahkan Kategori'
    );
  }

  /**
   * Display the specified resource.
   */

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Category $category)
  {
    return view('dashboard.category.edit', [
      'data' => $category,
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Category $category)
  {
    $data = $request->validate([
      'name' => 'required|min:3|max:255',
    ]);

    Category::where('id', $category->id)->update($data);
    return redirect('/dashboard/category')->with(
      'status',
      'Berhasil merubah Kategori'
    );
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Category $category)
  {
    Category::destroy($category->id);
    Post::where('category_id', $category->id)->delete();
    return redirect('/dashboard/category')->with(
      'status',
      'Berhasil menghapus Kategori'
    );
  }
}
