<?php

namespace App\Repositories\Interfaces;

/**
 * Interface WardServiceInterface
 * @package App\Services\Interfaces
 */
interface WardRepositoryInterface
{
    public function all();
    public function getWardsByDistrictCode(int $district_code);
}
