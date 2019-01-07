<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PaymentsRepository;
use App\Models\Payments;
use App\Validators\PaymentsValidator;

/**
 * Class PaymentsRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PaymentsRepositoryEloquent extends BaseRepository implements PaymentsRepository
{
    public function selectBoxList(string $descricao = 'formPag', string $chave = 'id'){
        return $this->model->pluck($descricao, $chave)->all();
    }
    
    public function model()
    {
        return Payments::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return PaymentsValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
