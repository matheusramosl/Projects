<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\SecretarioRepository;
use App\Models\Secretario;
use App\Validators\SecretarioValidator;

/**
 * Class SecretarioRepositoryRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SecretarioRepositoryEloquent extends BaseRepository implements SecretarioRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Secretario::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
