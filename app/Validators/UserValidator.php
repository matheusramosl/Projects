<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class UserValidator.
 *
 * @package namespace App\Validators;
 */
class UserValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
        	'name'        => 'required',
    		'cpf'         => 'required|unique:users,cpf',
    		'phone'       => 'required',
    		'email'       => 'required|unique:users,email',
            'profile_id'  => 'required|exists:profiles,id',
    		'password'    => 'required',
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
