<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Grid;

/**
 * Class GridTransformer.
 *
 * @package namespace App\Transformers;
 */
class GridTransformer extends TransformerAbstract
{
    /**
     * Transform the Grid entity.
     *
     * @param \App\Models\Grid $model
     *
     * @return array
     */
    public function transform(Grid $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
