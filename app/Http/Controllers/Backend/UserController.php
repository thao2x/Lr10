<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\Interfaces\UserServiceInterface as UserService;


class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function index(){
        $users = $this->userService->paginate();
        // dd($users);

        $config = $this->config();
        $template = 'backend.user.index';
        $config['seo']  = config('apps.user');
        
        return view('backend.dashboard.layout',[
            'template' => $template,
            'config' => $config,
            'users' => $users
        ]);
    }
    
    public function create() {
        $template = 'backend.user.create';
        $config['seo']  = config('apps.user');

        return view('backend.dashboard.layout',[
            'template' => $template,
            'config' => $config
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
