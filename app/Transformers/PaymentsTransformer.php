<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Payments;

/**
 * Class PaymentsTransformer.
 *
 * @package namespace App\Transformers;
 */
class PaymentsTransformer extends TransformerAbstract
{
    /**
     * Transform the Payments entity.
     *
     * @param \App\Models\Payments $model
     *
     * @return array
     */
    public function transform(Payments $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
