<?php

namespace App\Repositories;

use App\Repositories\Interfaces\WardRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\Ward;

/**
 * Class WardService
 * @package App\Repositories
 */
class WardRepository extends BaseRepository implements WardRepositoryInterface
{
    protected $model;

    public function __construct(Ward $model)
    {
        $this->model = $model;
    }

    public function findWardByDistrictCode(int $district_code) {
        return $this->model->where("district_code","=", $district_code)->get();
    }
}
