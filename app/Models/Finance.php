<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Finance.
 *
 * @package namespace App\Models;
 */
class Finance extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    public $timestamps  = true;
		protected $table    = 'planos';
    protected $fillable = [
    	'nome_plano',
    	'valor_parcelas',
    	'valor_prof',
    	'valor_escola',
    	'quant_parcelas',
	];
	
	public function setValorParcelasAttribute($val){
		$this->attributes['valor_parcelas'] = str_replace(',', '.', $val);
	}
	public function setValorProfAttribute($val){
		$this->attributes['valor_prof'] = str_replace(',', '.', $val);
	}
	public function setValorEscolaAttribute($val){
		$this->attributes['valor_escola'] = str_replace(',', '.', $val);
	}
	
	public function getValorParcelasAttribute(){
		return str_replace('.', ',', $this->attributes['valor_parcelas']);
	}
	public function getValorProfAttribute(){
		return str_replace('.', ',', $this->attributes['valor_prof']);
	}
	public function getValorEscolaAttribute(){
		return str_replace('.', ',', $this->attributes['valor_escola']);
	}
	
}
