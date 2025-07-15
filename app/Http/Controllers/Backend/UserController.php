<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
// use App\Services\Interfaces\UserServiceInterface as UserService;
use App\Services\UserService as UserService1;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService1 $userService) {
        $this->userService = $userService;
    }

    public function index(){
        $users = $this->userService->paginate();
        // dd($users);

        $config = $this->config();
        $template = 'backend.user.index';
        
        return view('backend.dashboard.layout',[
            'template' => $template,
            'config' => $config,
            'users' => $users
        ]);
    }
    
    private function config() {
        return [
            'js' => [
                'backend/js/plugins/switchery/switchery.js'
            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css'
            ]
        ];
    }
}
