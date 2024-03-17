<?php

namespace App\Repositories;

use App\Models\PostCatalogue;
use App\Repositories\Interfaces\PostCatalogueRepositoryInterface;
use Faker\Provider\Base;
use App\Repositories\BaseRepository;

/**
 * Class PostCatalogueService
 * @package App\Services
 */
class PostCatalogueRepository extends BaseRepository implements PostCatalogueRepositoryInterface
{
    protected $model;

    public function __construct(
        PostCatalogue $model
    ) {
        $this->model = $model;
    }

    
}
