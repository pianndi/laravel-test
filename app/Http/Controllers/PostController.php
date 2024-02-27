<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class PostController extends Controller
{
  public static function index()
  {
    $posts = Post::latest()->filter(request(['search', 'category', 'author']));
    $page = '';

    if (request('category')) {
      $category = Category::firstWhere('slug', request('category'));
      $page .= ' kategori ' . $category->name;
    }
    if (request('author')) {
      $user = User::firstWhere('username', request('author'));
      $page .= ' oleh ' . $user->name;
    }
    return view('posts', [
      'title' => 'Post',
      'page' => 'Semua Postingan' . $page,
      'data' => $posts->paginate(7)->withQueryString(),
    ]);
  }
  public static function show(Post $post)
  {
    if (!$post) {
      return view('notfound', ['title' => '404', 'url' => $post]);
    }
    return view('post', [
      'title' => $post['title'],
      'data' => $post,
    ]);
  }
}
