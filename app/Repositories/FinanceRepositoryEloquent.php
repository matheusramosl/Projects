<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\FinanceRepository;
use App\Models\Finance;
use App\Validators\FinanceValidator;

/**
 * Class FinanceRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class FinanceRepositoryEloquent extends BaseRepository implements FinanceRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Finance::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
