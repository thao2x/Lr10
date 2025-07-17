<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\Interfaces\UserServiceInterface as UserService;
use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceRepository;
use App\Repositories\Interfaces\DistrictRepositoryInterface as DistrictRepository;


class UserController extends Controller
{
    protected $userService;
    protected $provinceRepository;
    protected $districtRepository;

    public function __construct(UserService $userService, ProvinceRepository $provinceRepository, DistrictRepository $districtRepository) {
        $this->userService = $userService;
        $this->provinceRepository = $provinceRepository;
        $this->districtRepository = $districtRepository;
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

        $location = [
            'province' => $this->provinceRepository->all(),
            'district'=> $this->districtRepository->all(),
        ];

        return view('backend.dashboard.layout',[
            'template' => $template,
            'config' => $config,
            'location' => $location
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
