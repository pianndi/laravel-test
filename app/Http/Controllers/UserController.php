<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
  public static function index()
  {
    return view('categories', [
      'title' => 'Category List',
      'data' => User::all(),
    ]);
  }
  public static function show(User $author)
  {
    return view('posts', [
      'title' => $author->name . ' Post',
      'page' => "Postingan milik $author->name",
      'data' => $author->posts->load(['category',"author"]),
    ]);
  }
}
