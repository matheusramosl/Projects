<?php

namespace App\Presenters;

use App\Transformers\ProfessorTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProfessorPresenter.
 *
 * @package namespace App\Presenters;
 */
class ProfessorPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProfessorTransformer();
    }
}
