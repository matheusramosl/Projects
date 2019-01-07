<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Prettus\Validator\Contracts\UserInterface;
use Prettus\Validator\Contracts\ValidatorInterface;	
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Database\QueryException;
use Exception;


class UserService
{
	private $repository;
	private $validator;
	
	public function __construct(UserRepository $repository, UserValidator $validator)
	{
		$this->repository = $repository;
		$this->validator  = $validator;
	}

	public function store($data){

		try{

			$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
			$user = $this->repository->create($data);

			return [
				'success' => true,
				'messages' =>"Usuário Cadastrado.",
				'data'	=> $user,
			];
		
		 }catch (Exception $e) {
		 	dd($e);
			switch (get_class($e)) {
				case QueryException::class 		: return ['success' => false, 'messages' => $e->getMessage()];
				case ValidatorException::class 	: return ['success' => false, 'messages' => $e->getMessageBag()];
				case Exeption::class 			: return ['success' => false, 'messages' => $e->getMessage()];
				default 						: return ['success' => false, 'messages' => get_class($e)];						
			}
		}
			/*return [
				'success' => false,
				'messages' => $e->getMessage(),
			];*/
		
	}
	public function update(){}

	public function delete(){}

}