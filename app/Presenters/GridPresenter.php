<?php

namespace App\Presenters;

use App\Transformers\GridTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class GridPresenter.
 *
 * @package namespace App\Presenters;
 */
class GridPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new GridTransformer();
    }
}
