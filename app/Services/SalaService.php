<?php

namespace App\Services;

use App\Repositories\SalaRepository;
use App\Validators\SalaValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Database\QueryException;
use Exception;


class SalaService
{
	private $repository;
	private $validator;
	
	public function __construct(SalaRepository $repository, SalaValidator $validator)
	{
		$this->repository = $repository;
		$this->validator  = $validator;
	}

	public function store($data){

		
		try {

			$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
			$sala = $this->repository->create($data);


			return [
				'success' => true,
				'messages' =>"Sala Criada.",
				'data'	=> $sala,
			];
			
		} catch (Exception $e) {
			switch (get_class($e)) {
				case QueryException::class 		: return ['success' => false, 'messages' => $e->getMessage()];
				case ValidatorException::class 	: return ['success' => false, 'messages' => $e->getMessageBag()];
				case Exception::class 			: return ['success' => false, 'messages' => $e->getMessage()];
				default 						: return ['success' => false, 'messages' => get_class($e)];						
			}

		}
	}
	public function update(){}

	public function delete($sala_id){
		try {

			$this->repository->destroy($sala_id);


			return [
				'success' => true,
				'messages' =>"Sala Removida",
				'data'	=> null,
			];
			
		} catch (\Exception $e) {
			return [
				'success' => false,
				'messages' => $e->getMessage(),
			];
		}
	}

}