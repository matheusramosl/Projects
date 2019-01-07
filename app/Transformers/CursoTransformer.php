<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Curso;

/**
 * Class CursoTransformer.
 *
 * @package namespace App\Transformers;
 */
class CursoTransformer extends TransformerAbstract
{
    /**
     * Transform the Curso entity.
     *
     * @param \App\Models\Curso $model
     *
     * @return array
     */
    public function transform(Curso $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
