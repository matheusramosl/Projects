<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', ['uses' => 'Controller@homepage']);
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout');

/*
------------------Auth perfis-------------------
*/
Route::group(['middleware' => ['auth','isSecretario']], function(){
	//Route::get('/secretario', 'SecretarioController@index');
	Route::resource('secretario', 'SecretarioController');
});

Route::group(['middleware' => ['auth','can:access-dashboard']], function(){
	Route::get('/dashboard', ['as' => 'user.dashboard','uses' => 'DashboardController@index']);	
});

Route::group(['middleware' => ['auth','can:access-user-resource']], function(){
	Route::resource('user', 'UsersController');
	Route::get('/cadastrar', ['as' => 'user.cadastro','uses' => 'UsersController@cadastrar']);

});
/*
------------------Rotas do usuario-------------------
*/

Route::get('/login', ['uses' => 'Controller@fazerLogin']);
Route::post('/login', ['as' => 'user.login','uses' => 'DashboardController@auth']);



/*
------------------Rotas de Professor-------------------
*/
Route::group(['middleware' => ['auth','can:access-professor-resource']], function(){
	Route::resource('professor', 'ProfessorsController');
	Route::get('/novoProfessor', ['as' => 'professor.cadastro','uses' => 'ProfessorsController@cadastroProfessor']);
	Route::get('/professor_secretario', ['as' => 'professor.secretario','uses' => 'ProfessorsController@indexSecretario']);
	Route::get('/professor_chamada', ['as' => 'professor.index-professor','uses' => 'ProfessorsController@indexProfessor']);
	Route::post('professors', 'ProfessorsController@search1')->name('professor.search1');
});
/*
------------------Rotas de Aluno-------------------
*/
Route::group(['middleware' => ['auth','can:access-student-resource']], function(){
	Route::resource('student', 'StudentsController');
	Route::get('/novoAluno', ['as' => 'student.cadastro','uses' => 'StudentsController@cadastroAluno']);
	Route::get('/aluno_secretario', ['as' => 'student.secretario', 'uses' => 'StudentsController@indexSecretario']);
	Route::get('/aluno_professor', ['as' => 'student.professor', 'uses' => 'StudentsController@indexProfessor']);
	Route::post('students', 'StudentsController@search')->name('student.search');
});
/*
------------------Rotas de Curso-------------------
*/
Route::group(['middleware' => ['auth','can:access-curso-resource']], function(){
	Route::resource('curso', 'CursosController');
	Route::get('/novoCurso', ['as' => 'curso.cadastro','uses' => 'CursosController@cadastroCurso']);
	Route::get('/curso_secretario', ['as' => 'curso.secretario', 'uses' => 'CursosController@indexSecretario']);
});
/*
------------------Rotas de Sala-------------------
*/
Route::group(['middleware' => ['auth','can:access-sala-resource']], function(){
	Route::resource('sala', 'SalasController');
	Route::get('/sala_secretario', ['as' => 'sala.secretario', 'uses' => 'SalasController@indexSecretario']);
});
/*
------------------Rotas de Grade Horária-------------------
*/
Route::group(['middleware' => ['auth','can:access-grid-resource']], function(){
	Route::resource('grid', 'GridsController');
	Route::get('/grade_secretario', ['as' => 'grid.secretario', 'uses' => 'GridsController@indexSecretario']);
});
/*
------------------Rotas de Finanças------------------
*/
Route::group(['middleware' => ['auth','can:access-finaces-resource']], function(){
	Route::resource('finance', 'FinancesController');
	Route::get('/novoPlano', ['as' => 'finance.cadastro','uses' => 'FinancesController@cadastroFinance']);
	//Route::get('/grade_secretario', ['as' => 'grid.secretario', 'uses' => 'GridsController@indexSecretario']);
});


//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');*/
