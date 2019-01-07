<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class StudentValidator.
 *
 * @package namespace App\Validators;
 */
class StudentValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
    	'name'   =>'required',
    	'phone'  =>'required',
    	'email'	 =>'required',
        'curso_id' =>'required|exists:cursos,id',	
        ],
        ValidatorInterface::RULE_UPDATE => [
        'name'   =>'required',
        'phone'  =>'required',
        'email'  =>'required',
        'curso_id' =>'required|exists:cursos,id',
        ],
    ];
}
