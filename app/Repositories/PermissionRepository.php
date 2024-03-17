<?php

namespace App\Repositories;

use App\Models\Permission;
use App\Repositories\Interfaces\PermissionRepositoryInterface;
use Faker\Provider\Base;
use App\Repositories\BaseRepository;

/**
 * Class PermissionService
 * @package App\Services
 */
class PermissionRepository extends BaseRepository implements PermissionRepositoryInterface
{
    protected $model;

    public function __construct(
        Permission $model
    ) {
        $this->model = $model;
    }

    
}
