<?php

namespace App\Presenters;

use App\Transformers\SalaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SalaPresenter.
 *
 * @package namespace App\Presenters;
 */
class SalaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SalaTransformer();
    }
}
