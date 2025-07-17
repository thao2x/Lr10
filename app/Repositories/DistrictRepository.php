<?php

namespace App\Repositories;

use App\Repositories\Interfaces\DistrictRepositoryInterface;
use App\Models\District;

/**
 * Class DistrictService
 * @package App\Repositories
 */
class DistrictRepository implements DistrictRepositoryInterface
{
    public function all(){
        return District::all();
    }
}
