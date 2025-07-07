<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct() {

    }

    public function index(){
        return view('backend.auth.login');
    }

    public function login(AuthRequest $request){
        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
