<?php

namespace App\Services;

use App\Repositories\ProfessorRepository;
use App\Validators\ProfessorValidator;
use Prettus\Validator\Contracts\ValidatorInterface;


class ProfessorService
{
	private $repository;
	private $validator;
	
	public function __construct(ProfessorRepository $repository, ProfessorValidator $validator)
	{
		$this->repository = $repository;
		$this->validator  = $validator;
	}

	public function store($data){

		try {
 
			$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
			$professor = $this->repository->create($data);
        

			return [
				'success'  => true,
				'messages' => "Cadastrado",
				'data'	   => $professor,
			];
			
		} catch (\Exception $e) {
			return [
				'success'  => false,
				'messages' => $e->getMessage(),
			];
		}
	}
	public function update($data, $id){
		try {
 
			$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
			$professor = $this->repository->update($data, $id);
        

			return [
				'success'  => true,
				'messages' => "Atualizado",
				'data'	   => $professor,
			];
			
		} catch (\Exception $e) {
			return [
				'success'  => false,
				'messages' => $e->getMessage(),
			];
		}
	}

	public function delete($professor_id){
		try {

			$this->repository->destroy($professor_id);


			return [
				'success'  => true,
				'messages' => "Professor Removido",
				'data'	   => null,
			];
			
		} catch (\Exception $e) {
			return [
				'success'  => false,
				'messages' => $e->getMessage(),
			];
		}
	}

}