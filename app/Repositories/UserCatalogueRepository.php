<?php

namespace App\Repositories;

use App\Models\UserCatalogue;
use App\Repositories\Interfaces\UserCatalogueRepositoryInterface;
use Faker\Provider\Base;
use App\Repositories\BaseRepository;

/**
 * Class UserCatalogueService
 * @package App\Services
 */
class UserCatalogueRepository extends BaseRepository implements UserCatalogueRepositoryInterface
{
    protected $model;

    public function __construct(
        UserCatalogue $model
    ) {
        $this->model = $model;
    }

    
}
