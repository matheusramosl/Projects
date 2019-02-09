<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Exception;
use Auth;
use Prettus\Validator\Exceptions\ValidatorException;


class DashboardController extends Controller
{
	private $repository;
	private $validator;

    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        //$this->middleware('auth');
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    public function index(){
    	return view('user.dashboard');
    }

    public function auth(Request $request){

    	$data = [
    		'email'       => $request->get('username'),
    		'password'    => $request->get('password')
    	];

    	try{
      
                Auth::attempt($data, false);   

                $user = $this->repository->findWhere($data)->first();
  //dd($user->isSecretario());

                if(!$user)
                    throw new Exception("Email ou Senha inválido");

                if($user->password != $request->get('password'))
                    throw new Exception("Senha Inválida");

                Auth::login($user);
                //if isAdmin()
                if ($user->isSecretario())
                    return redirect()->route('secretario.index');
                if ($user->isAdmin())
                    return redirect()->route('user.dashboard');
                if ($user->isDiretor())
                    return redirect()->route('user.dashboard');
                if ($user->isProfessor())
                    return redirect()->route('professor.index-professor');

           
    		//return redirect()->route('user.dashboard');
    	}


    	catch (Exception $e){
          
    		return $e->getMessage();
    	}
    }
}
