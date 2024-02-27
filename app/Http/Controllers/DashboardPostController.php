<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('dashboard.post.index', [
      'data' => Post::where('user_id', auth()->user()->id)
        ->latest()
        ->paginate(15),
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('dashboard.post.create', [
      'categories' => Category::all(),
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $post = $request->validate([
      'title' => 'required|min:3|max:255',
      'slug' => 'required|min:3|unique:posts',
      'category_id' => 'required|numeric',
      'image' => 'image|file|max:5120',
      'body' => 'required|min:12',
    ]);
    if ($request->has('image')) {
      $post['image'] = $request->file('image')->store('post-images');
    }

    $post['user_id'] = auth()->user()->id;
    $post['excerpt'] = Str::limit(strip_tags($request->body), 100);

    Post::create($post);
    return redirect('/dashboard/post')->with(
      'status',
      'Berhasil menambahkan Postingan'
    );
  }

  /**
   * Display the specified resource.
   */
  public function show(Post $post)
  {
    return view('dashboard.post.show', ['data' => $post]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Post $post)
  {
    return view('dashboard.post.edit', [
      'categories' => Category::all(),
      'post' => $post,
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Post $post)
  {
    $data = $request->validate([
      'title' => 'required|min:5|max:255',
      'category_id' => 'required|numeric',
      'image' => 'image|file|max:5120',
      'body' => 'required|min:12',
    ]);
    if ($request->has('image')) {
      if ($post->image) {
        Storage::delete($post->image);
      }
      $data['image'] = $request->file('image')->store('post-images');
    }
    $data['user_id'] = auth()->user()->id;
    $data['excerpt'] = Str::limit(strip_tags($request->body), 100);

    Post::where('id', $post->id)->update($data);
    return redirect('/dashboard/post')->with(
      'status',
      'Berhasil merubah Postingan'
    );
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Post $post)
  {
    if ($post->image) {
      Storage::delete($post->image);
    }
    Post::destroy($post->id);
    return redirect('/dashboard/post')->with(
      'status',
      'Berhasil menghapus Postingan'
    );
  }
}
