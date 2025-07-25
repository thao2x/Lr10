<?php

namespace App\Repositories\Interfaces;

/**
 * Interface DistrictServiceInterface
 * @package App\Services\Interfaces
 */
interface DistrictRepositoryInterface
{
    public function all();
    public function getDistrictsByProvinceCode(int $province_code);
    public function findByCode(int $province_code);
}
