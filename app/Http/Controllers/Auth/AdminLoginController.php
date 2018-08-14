<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
  <?php

  namespace App\Http\Controllers\Auth;

  use App\Http\Controllers\Controller;
  use Illuminate\Foundation\Auth\AuthenticatesUsers;

  class LoginController extends Controller
  {
      /*
      |--------------------------------------------------------------------------
      | Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles authenticating users for the application and
      | redirecting them to your home screen. The controller uses a trait
      | to conveniently provide its functionality to your applications.
      |
      */

      use AuthenticatesUsers;

      /**
       * Where to redirect users after login.
       *
       * @var string
       */
      protected $redirectTo = '/admin';
      protected $guard = 'admin';


      /**
       * Create a new controller instance.
       *
       * @return void
       */
      public function __construct()
      {
          $this->middleware('guest')->except('logout');
      }


      public function showLoginForm()
      {
          return view('auth.admin_login');
      }

      public function login(Request $request)
      {
        // Validate the form data
        $this->validate($request, [
          'email'   => 'required|email',
          'password' => 'required|min:6'
        ]);

        // Attempt to log the user in
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
          // if successful, then redirect to their intended location
          return redirect()->intended(route('admin.dashboard'));
        }
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
      }

      public function logout()
      {
          Auth::guard('admin')->logout();
          return redirect('/admin');
      }

  }

}
