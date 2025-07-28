<?php

namespace App\Repositories\Interfaces;

/**
 * Interface BaseServiceInterface
 * @package App\Services\Interfaces
 */
interface BaseRepositoryInterface
{
    public function all();
    public function create(array $payload = []);
    public function update (int $id = 0, array $payload = []);
    public function delete (int $id = 0);
}
