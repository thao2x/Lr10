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

    public function paginate($request) {

        $keyword = $request->input('keyword');
        $perPage = $request->input('perpage') ? $request->input('perpage') : '20';
        $user_catalogue_id = $request->input('user_catalogue_id');

        $users = $this->userRepository->pagination(['id', 'name', 'email', 'phone', 'address', 'publish'], 
                                                    ['keyword' => $keyword, 'user_catalogue_id' => $user_catalogue_id], 
                                                    $perPage);
        return $users;
    }

    public function create ($request) {
        DB::beginTransaction();
        try {
            $payload = $request->input();
            $payload['password'] = Hash::make($payload['password']);

            $user = $this->userRepository->create($payload);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
            echo $e->getMessage();
            return false;
        }
    }

    public function update ($id, $request) {
        DB::beginTransaction();
        try {
            $payload = $request->input();

            $user = $this->userRepository->update($id, $payload);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
            echo $e->getMessage();
            return false;
        }
    }

    public function delete ($id) {
        DB::beginTransaction();
        try {
            $user = $this->userRepository->delete($id);

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
