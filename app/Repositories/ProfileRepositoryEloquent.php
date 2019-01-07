<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ProfileRepsitoryRepository;
use App\Models\ProfileRepsitory;
use App\Validators\ProfileRepsitoryValidator;

/**
 * Class ProfileRepsitoryRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ProfileRepsitoryRepositoryEloquent extends BaseRepository implements ProfileRepsitoryRepository
{

    public function selectBoxList(string $descricao = 'name', string $chave = 'id'){
        return $this->model->pluck($descricao, $chave)->all();
    }
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProfileRepsitory::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
