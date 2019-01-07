<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Curso.
 *
 * @package namespace App\Models;
 */
class Profile extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
    	'name',
		'description',
    ];
    public function User(){
        return $this->hasMany(User::class);
    }

}