<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Sala;

/**
 * Class SalaTransformer.
 *
 * @package namespace App\Transformers;
 */
class SalaTransformer extends TransformerAbstract
{
    /**
     * Transform the Sala entity.
     *
     * @param \App\Models\Sala $model
     *
     * @return array
     */
    public function transform(Sala $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
