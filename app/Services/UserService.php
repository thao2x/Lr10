<?php

namespace App\Services;

use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Illuminate\Support\Facades\Request;

/**
 * Class UserService
 * @package App\Services
 */
class UserService implements UserServiceInterface
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function paginate() {
        $users = $this->userRepository->getAllPaginate();
        return $users;
    }

    public function create ($request) {
        DB::beginTransaction();
        try {
            $payload = $request->input();
            $payload['password'] = Hash::make($payload['password']);

            $user = $this->userRepository->create($payload);
            // dd($user);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
            echo $e->getMessage();
            return false;
        }
    }
}
