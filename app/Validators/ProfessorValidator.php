<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class ProfessorValidator.
 *
 * @package namespace App\Validators;
 */
class ProfessorValidator extends LaravelValidator
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
        'cpf'    =>'required',	
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
