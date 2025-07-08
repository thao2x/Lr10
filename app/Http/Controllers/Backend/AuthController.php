<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

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
 
            return redirect(route('dashboard.index'));
        }
 
        toastr()->error('Sai email hoặc mật khẩu. Vui lòng thử lại!');
        return back();
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect(route('auth.admin'));
    }
}
