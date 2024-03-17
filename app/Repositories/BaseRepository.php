<?php

namespace App\Repositories;

use App\Models\Base;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Interfaces\BaseRepositoryInterface;

/**
 * Class BaseService
 * @package App\Services
 */
class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function __construct(
        Model $model
    ) {
        $this->model = $model;
    }

    public function pagination(
        array $column = ['*'], 
        array $condition = [], 
        array $join = [],
        array $extend = [],
        int $perPage = 1,
        array $relations = [],
        ) {
        $query = $this->model->select($column);
        
        $query->keyword($condition['keyword'] ?? null)
              ->publish($condition['publish'] ?? null)
              ->relationCount($relations ?? null)
              ->customJoin($join ?? null);
        

        
        return $query->paginate($perPage)
                    ->withQueryString()->withPath(env('APP_URL').$extend['path']);
    }

    public function create(array $payload = [])
    {
        $model = $this->model->create($payload);
        return $model->fresh();
    }

    public function update(int $id = 0, array $payload = []){
        $model = $this->findById($id);
        return $model->update($payload);
    }

    public function delete(int $id = 0) {
        return $this->findById($id)->delete();
    }

    public function forceDelete(int $id = 0) {
        return $this->findById($id)->forceDelete();
    }

    public function all(array $relation = [])
    {
        return $this->model->with($relation)->get();
    }

    public function findById(
        $modelId,
        $column = ['*'],
        $relation = []
    ) {
        return $this->model->select($column)->with($relation)->findOrFail($modelId);
    }
}
