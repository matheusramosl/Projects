<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ProfessorRepository;
use App\Models\Professor;
use App\Validators\ProfessorValidator;

/**
 * Class ProfessorRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ProfessorRepositoryEloquent extends BaseRepository implements ProfessorRepository
{

    public function selectBoxList(string $descricao = 'name', string $chave = 'id'){
        return $this->model->pluck($descricao, $chave)->all();
    }



    public function model()
    {
        return Professor::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ProfessorValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
