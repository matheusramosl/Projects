<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Secretario;


class SecretarioController extends Controller
{
    public function __construct(){

    }
    public function index(){
    	return view('secretario.index');

    }
    public function login(Request $request){
    	$secretario  = Secretario::all();
    	//dd($secretario);
    	return view('secretario.login-secretario');
    }
    public function postLogin(Request $request){
    	//dd($request->all());
    	$validator = validator($request->all(), [
    		'email' => 'min:3|max:100',
    		'password' => 'min:3|max:100',
    	]);
    	if ($validator->fails()) {
    		return redirect('/secretario/login')
    					->withErrors($validator)
    					->withInput();
    	}

    	$data = [
    		'email'    => $request->get('username'),
    		'password' => $request->get('password')
    	];  
    	//$credentials = $request->only('email', 'password');

    	if (Auth::guard('secretario')->attempt($data)) {
    		return redirect('/secretario');
    	}else{
    		return redirect('/secretario/login')
    					->withErrors(['errors' => 'Login Inváido!'])
    					->withInput();
    	}
    }

   
}
