<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Professor;

/**
 * Class ProfessorTransformer.
 *
 * @package namespace App\Transformers;
 */
class ProfessorTransformer extends TransformerAbstract
{
    /**
     * Transform the Professor entity.
     *
     * @param \App\Models\Professor $model
     *
     * @return array
     */
    public function transform(Professor $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
