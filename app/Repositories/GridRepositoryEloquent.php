<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\GridRepository;
use App\Models\Grid;
use App\Validators\GridValidator;

/**
 * Class GridRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class GridRepositoryEloquent extends BaseRepository implements GridRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Grid::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return GridValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
