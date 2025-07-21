<?php

namespace App\Repositories\Interfaces;

/**
 * Interface WardServiceInterface
 * @package App\Services\Interfaces
 */
interface WardRepositoryInterface
{
    public function all();
    public function findWardByDistrictCode(int $district_code);
}
