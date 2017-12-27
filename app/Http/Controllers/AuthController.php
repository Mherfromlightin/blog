<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $redirectTo = 'home';

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        if (auth()->attempt($request->only(['email', 'password']))) {
            return redirect($this->redirectTo);
        }

        return redirect()->back()->withErrors([
            'email' => 'Wrong password fella'
        ]);
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:2|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:50',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        auth()->login($user);

        return redirect($this->redirectTo);
    }

    public function redirectTo($uri)
    {
        return $this->redirectTo = $uri;
    }

    public function logout()
    {
        auth()->logout();

        return redirect('login');
    }
}