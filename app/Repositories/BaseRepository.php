<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BaseRepositoryInterface;
use App\Models\Base;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseService
 * @package App\Repositories
 */
class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create (array $payload = []) 
    {
        $model = $this->model->create($payload);
        return $model->fresh();
    }

    public function update (int $id = 0, array $payload = []) 
    {
        $model = $this->model->findOrFail($id);
        $model->fill($payload)->save();

        return $model;
    }

    public function delete (int $id = 0) 
    {
        $model = $this->model->findOrFail($id);
        $model->delete($id);

        return $model;
    }
    
    public function all()
    {
        return $this->model->all();
    }

    public function pagination($column = ['*'], $condition = [], $join = [], $perpage = 20)
    {
        $query = $this->model->select($column)->where($condition);

        // Nếu có join
        foreach ($join as $item) {
            // item dạng: ['table' => 'categories', 'first' => 'products.category_id', 'operator' => '=', 'second' => 'categories.id']
            $query->join($item['table'], $item['first'], $item['operator'], $item['second']);
        }

        return $query->paginate($perpage);
    }
}
