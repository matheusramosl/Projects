<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\salaRepository;
use App\Models\Sala;
use App\Validators\SalaValidator;

/**
 * Class SalaRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SalaRepositoryEloquent extends BaseRepository implements SalaRepository
{
   public function selectBoxList(string $descricao = 'name', string $chave = 'id'){
        return $this->model->pluck($descricao, $chave)->all();
    }
    
    public function model()
    {
        return Sala::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return SalaValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
