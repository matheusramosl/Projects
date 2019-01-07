<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class CursoValidator.
 *
 * @package namespace App\Validators;
 */
class CursoValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
        	'name'   	=>'required',
    		'horarios'  =>'required',
            'professor_id' =>'required|exists:professors,id',
            'sala_id' =>'required|exists:salas,id'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name'      =>'required',
            'horarios'  =>'required',
            'professor_id' =>'required|exists:professors,id',
            'sala_id' =>'required|exists:salas,id'
        ],
    ];
}
