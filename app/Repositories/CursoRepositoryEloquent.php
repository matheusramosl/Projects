<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CursoRepository;
use App\Models\Curso;
use App\Validators\CursoValidator;

/**
 * Class CursoRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CursoRepositoryEloquent extends BaseRepository implements CursoRepository
{
    public function selectBoxList(string $descricao = 'name', string $chave = 'id'){
        return $this->model->pluck($descricao, $chave)->all();
    }


    public function model()
    {
        return Curso::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CursoValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
