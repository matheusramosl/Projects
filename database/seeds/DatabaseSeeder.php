<?php

use Illuminate\Database\Seeder;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([	
    	'name'		    => 'Matheus Ramos',
    	'cpf'		    => '12323426345',
    	'phone'		    => '987656543',
        'profile_id'    => 1,
    	'email'		    => 'matheus.fluzao@hotmail.com',
    	'password'	    => env('PASSWORD_HASH') ? bcrypt('123456') : '123456'
        ]);
        /*
        DB::table('users')->insert([
        'name'          => 'Matheus Ramos',
        'cpf'           => '12323426345',
        'phone'         => '987656543',
        'profile_id'    => 1,
        'email'         => 'matheus.fluzao@hotmail.com',
        'password'      => env('PASSWORD_HASH') ? bcrypt('123456') : '123456'
        ]);*/
    }
}
