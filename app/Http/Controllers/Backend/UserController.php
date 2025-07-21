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

        $template = 'backend.user.index';
        $config = [
            'js' => [
                'backend/js/plugins/switchery/switchery.js'
            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css'
            ],
            'seo' => config('apps.user')
        ];
        
        return view('backend.dashboard.layout',[
            'template' => $template,
            'config' => $config,
            'users' => $users
        ]);
    }
    
    public function create() {
        $template = 'backend.user.create';
        $config = [
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                'backend/library/location.js'
            ],
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
            ],
            'seo' => config('apps.user')
        ];

        $location = [
            'province' => $this->provinceRepository->all(),
        ];

        return view('backend.dashboard.layout',[
            'template' => $template,
            'config' => $config,
            'location' => $location
        ]);
    }

    public function store(Request $request) {
        dd(1);die(  );
    }
}
