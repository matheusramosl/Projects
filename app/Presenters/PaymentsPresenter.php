<?php

namespace App\Presenters;

use App\Transformers\PaymentsTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PaymentsPresenter.
 *
 * @package namespace App\Presenters;
 */
class PaymentsPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PaymentsTransformer();
    }
}
