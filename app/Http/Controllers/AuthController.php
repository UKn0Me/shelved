<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;

class AuthController extends Controller
{
    public function getSignup()
    {
        return view('signup');
    }

    public function postSignup(Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        if ($user->save()) {
            // User was saved to the database
            return redirect('/login');
        } else {
            // Saving the user failed
            return back()->withInput();
        }
    }

    public function getLogin()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication passed
            return redirect()->intended('/dashboard');
        } else {
            // Authentication failed
            return back()->withInput();
        }
    }

    public function getLogout()
    {
        if(Auth::logout()) {
            return redirect()->intended('/');
        } else {
            return back();
        }
    }
}
