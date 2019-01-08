<?php

namespace App\Services;

use App\Repositories\FinanceRepository;
use App\Validators\FinanceValidator;
use Prettus\Validator\Contracts\ValidatorInterface;


class FinanceService
{
	private $repository;
	private $validator;
	
	public function __construct(FinanceRepository $repository, FinanceValidator $validator)
	{
		$this->repository = $repository;
		$this->validator  = $validator;
	}

	public function store($data){

		try {
 
			$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
			$plano = $this->repository->create($data);
        

			return [
				'success'  => true,
				'messages' => "Plano concluído com sucesso!",
				'data'	   => $plano,
			];
			
		} catch (\Exception $e) {
			return [
				'success'  => false,
				'messages' => $e->getMessage(),
			];
		}
	}
	public function update($plano_id, array $data) :array{
		try {

			$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
			$plano = $this->repository->update($data, $plano_id);
			
			return [
				'success' => true,
				'messages' =>"Plano Atualizado",
				'data'	=> $plano,
			];
			
		}catch (\Exception $e) {
			return [
				'success'  => false,
				'messages' => $e->getMessage(),
			];
		}
	}

	public function delete($plano_id){
		try {
			$id = $this->repository->delete($plano_id);
			


			return [
				'success'  => true,
				'messages' =>"Plano Removido",
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