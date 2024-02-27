<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
  public function index()
  {
    return view('register', [
      'title' => 'Daftar',
    ]);
  }
  public function store(Request $request)
  {
    $user = $request->validate([
      'name' => 'required|min:3',
      'username' => 'required|min:3|max:16|unique:users',
      'email' => 'required|email:dns|unique:users,email',
      'password' => 'required|min:5|same:verify_password',
      'verify_password' => 'required|min:5|same:password',
    ]);

    User::create([
      'name' => $user['name'],
      'username' => $user['username'],
      'email' => $user['email'],
      'password' => bcrypt($user['password']),
    ]);
    return redirect('/login')->with('registerSuccess', 'Berhasil');
  }
}
