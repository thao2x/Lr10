<?php

namespace App\Repositories;

use App\Repositories\Interfaces\DistrictRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\District;

/**
 * Class DistrictService
 * @package App\Repositories
 */
class DistrictRepository extends BaseRepository implements DistrictRepositoryInterface
{
    protected $model;

    public function __construct(District $model)
    {
        $this->model = $model;
    }

    public function findDistrictByProvinceCode(int $province_id) {
        return $this->model->where("province_code","=", $province_id)->get();
    }
}
