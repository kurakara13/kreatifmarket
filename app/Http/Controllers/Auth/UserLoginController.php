<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class UserLoginController extends Controller
{
  use AuthenticatesUsers;
  public function __construct()
  {
    $this->middleware('guest:user',['except'=>'logout']);
  }
  public function showLoginForm()
  {
    return view('auth.login');
  }
  public function login(Request $request)
  {
    // Validate the form data
    $this->validate($request, [
      'email'   => 'required|email',
      'password' => 'required|min:6'
    ]);
    // Attempt to log the user in
    if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password, 'verified' => 1], $request->remember)) {
      // if successful, then redirect to their intended location
      return redirect()->intended(route('home'));
    }else {
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }

  }
}
