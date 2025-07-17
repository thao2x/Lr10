<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ProvinceRepositoryInterface;
use App\Models\Province;
use App\Models\User;

/**
 * Class ProvinceService
 * @package App\Repositories
 */
class ProvinceRepository implements ProvinceRepositoryInterface
{
    public function all(){
        return Province::all();
    }
}
