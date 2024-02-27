<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  //
  public function index()
  {
    return view('login', [
      'title' => 'Masuk',
    ]);
  }
  public function authenticate(Request $request)
  {
    $cred = $request->validate([
      'username' => 'required',
      'password' => 'required',
    ]);
    if (Auth::attempt($cred)) {
      $request->session()->regenerate();
      return redirect()->intended('dashboard');
    }
    return back()->with('loginError', 'Gagal Masuk!');
  }
  public function logout()
  {
    Auth::logout();

    request()
      ->session()
      ->invalidate();

    request()
      ->session()
      ->regenerateToken();

    return redirect('/');
  }
}
