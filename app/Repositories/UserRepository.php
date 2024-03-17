<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Faker\Provider\Base;
use App\Repositories\BaseRepository;

/**
 * Class UserService
 * @package App\Services
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $model;

    public function __construct(
        User $model
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
        $query = $this->model->select($column)->where(function($query) use ($condition) {
            if(isset($condition['keyword']) && !empty($condition['keyword'])) {
                $query->where('name', 'LIKE', '%'.$condition['keyword'].'%')
                    ->orWhere('email', 'LIKE', '%'.$condition['keyword'].'%')
                    ->orWhere('phone', 'LIKE', '%'.$condition['keyword'].'%')
                    ->orWhere('address', 'LIKE', '%'.$condition['keyword'].'%');
            }
            return $query;
        })->publish($condition['publish'] ?? null)->with('user_catalogues');
        // return $query;

        if(!empty($join)) {
            $query->join(...$join);
        }
        return $query->paginate($perPage)
                    ->withQueryString()->withPath(env('APP_URL').$extend['path']);
    }

    // public function getAllpaginate()
    // {
    //     return User::paginate(15);
    // }
}
