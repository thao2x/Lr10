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

    public function pagination(
                        array $column = ['*'],
                        array $condition = [],
                        // array $join = [],   
                        int $perPage = 20
    ) {
        $query = $this->model->select($column)
            ->when(!empty($condition['keyword']), fn($q) =>
                $q->where('name', 'like', '%' . $condition['keyword'] . '%')
            )
            ->when(!empty($condition['user_catalogue_id']), fn($q) =>
                $q->where('user_catalogue_id', 'like', '%' . $condition['user_catalogue_id'] . '%')
            );
        

        // dd($query->toSql());
        // if (!empty($join)) {
        //     $query->join(...$join);
        // }

        return $query->paginate($perPage)->appends(request()->query());
    }
}
