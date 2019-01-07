<?php

namespace App\Services;

use App\Repositories\CursoRepository;
use App\Validators\CursoValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Database\QueryException;
use Exception;


class CursoService
{
	private $repository;
	private $validator;
	
	public function __construct(CursoRepository $repository, CursoValidator $validator)
	{
		$this->repository = $repository;
		$this->validator  = $validator;
	}

	public function store(array $data){

		
		try {

			$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
			$curso = $this->repository->create($data);


			return [
				'success'  => true,
				'messages' => "Curso Criado.",
				'data'	   => $curso,
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
	public function update($curso_id, array $data) : array{

		try {

			$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
			$curso = $this->repository->update($data, $curso_id);


			return [
				'success'  => true,
				'messages' =>"Curso Atualizado",
				'data'	   => $curso,
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

	public function delete($curso_id){
		try {

			$id = $this->repository->delete($curso_id);


			return [
				'success'  => true,
				'messages' =>"Curso Removido",
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