<?php

namespace App\Services;

use App\Repositories\StudentRepository;
use App\Repositories\CursoRepository;
use App\Validators\StudentValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Database\QueryException;
use Exception;


class StudentService
{
	private   $repository;
	protected $cursoRepository;
	private   $validator;
	
	public function __construct(StudentRepository $repository, StudentValidator $validator, CursoRepository $cursoRepository)
	{
		$this->repository 		= 	$repository;
		$this->cursoRepository  = 	$cursoRepository;
		$this->validator  		= 	$validator;
	}

	public function store($data){
		
		try {

			$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
			$student = $this->repository->create($data);
			
			return [
				'success'  => true,
				'messages' => "Usuário Cadastrado.",
				'data'	   => $student,
			];
			
		} catch (Exception $e) {
			dd($e);
			switch (get_class($e)) {
				case QueryExeption::class 		: return ['success' => false, 'messages' => $e->getMessage()];
				case ValidatorExeption::class 	: return ['success' => false, 'messages' => $e->getMessageBag()];
				case Exeption::class 			: return ['success' => false, 'messages' => $e->getMessage()];
				default 						: return ['success' => false, 'messages' => $e->getMessage()];						
			}

		}
	}
	public function update($student_id, array $data) : array{
		try {

			$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
			$student = $this->repository->update($data, $student_id);
			
			return [
				'success' => true,
				'messages' =>"Atualizado",
				'data'	=> $student,
			];
			
		} catch (Exception $e) {
			dd($e);
			switch (get_class($e)) {
				case QueryExeption::class 		: return ['success' => false, 'messages' => $e->getMessage()];
				case ValidatorExeption::class 	: return ['success' => false, 'messages' => $e->getMessageBag()];
				case Exeption::class 			: return ['success' => false, 'messages' => $e->getMessage()];
				default 						: return ['success' => false, 'messages' => $e->getMessage()];					
			}
		}

	}

	public function delete($student_id){
		try {
			$id = $this->repository->delete($student_id);
			


			return [
				'success'  => true,
				'messages' =>"Aluno Removido",
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