<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Services\Interfaces\UserServiceInterface as UserService;
use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceRepository;
use App\Repositories\Interfaces\DistrictRepositoryInterface as DistrictRepository;
use App\Repositories\Interfaces\WardRepositoryInterface as WardRepository;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    protected $userService;
    protected $provinceRepository;
    protected $districtRepository;
    protected $wardRepository;
    protected $userRepository;

    public function __construct(
        UserService $userService,
        ProvinceRepository $provinceRepository,
        DistrictRepository $districtRepository,
        WardRepository $wardRepository,
        UserRepository $userRepository
    ) {
        $this->userService = $userService;
        $this->provinceRepository = $provinceRepository;
        $this->districtRepository = $districtRepository;
        $this->wardRepository = $wardRepository;
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        $users = $this->userService->paginate($request);

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

        return view('backend.dashboard.layout', [
            'template' => $template,
            'config' => $config,
            'users' => $users
        ]);
    }

    public function create()
    {
        $template = 'backend.user.form';
        $config = [
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                'backend/library/location.js',
            ],
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
            ],
            'seo' => config('apps.user'),
            'method' => 'create'
        ];

        $location = [
            'province' => $this->provinceRepository->all(),
        ];

        return view('backend.dashboard.layout', [
            'template' => $template,
            'config' => $config,
            'location' => $location
        ]);
    }

    public function store(StoreUserRequest $request)
    {
        if ($this->userService->create($request)) {
            toastr()->success('Thêm mới bản ghi thành công!');

            return redirect()->route('user.index');

        } else {
            toastr()->error('Thêm mới bản ghi thất bại!');
            return redirect()->route('user.index');
        }
    }

    public function edit ($id) 
    {
        $user = $this->userRepository->findById($id);
        $user->birthday = Carbon::parse($user->birthday)->format('Y-m-d');
        
        $template = 'backend.user.form';
        $config = [
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                'backend/library/location.js',
            ],
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
            ],
            'seo' => config('apps.user'),
            'method'=> 'edit'
        ];

        $location = [
            'province' => $this->provinceRepository->all(),
        ];

        return view('backend.dashboard.layout', [
            'template' => $template,
            'config' => $config,
            'location' => $location,
            'user' => $user
        ]);
    }

    public function update ($id, UpdateUserRequest $request) 
    {
        if ($this->userService->update($id, $request)) {
            toastr()->success('Cập nhật bản ghi thành công!');

            return redirect()->route('user.index');

        } else {
            toastr()->error('Cập nhật bản ghi thất bại!');
            return redirect()->route('user.index');
        }
    }

    public function delete ($id) 
    {
        $user = $this->userRepository->findById($id);
        
        $template = 'backend.user.delete';
        $config = [
            'seo' => config('apps.user'),
            'method'=> 'delete'
        ];

        $location = [
            'province' => $this->provinceRepository->all(),
        ];

        return view('backend.dashboard.layout', [
            'template' => $template,
            'config' => $config,
            'user' => $user
        ]);
    }

    public function destroy ($id) 
    {
        if ($this->userService->delete($id)) {
            toastr()->success('Xóa bản ghi thành công!');

            return redirect()->route('user.index');

        } else {
            toastr()->error('Xóa bản ghi thất bại!');
            return redirect()->route('user.index');
        }
    }
}
