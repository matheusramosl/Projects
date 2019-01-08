<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\UserRepository::class, \App\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\StudentRepository::class, \App\Repositories\StudentRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProfessorRepository::class, \App\Repositories\ProfessorRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CursoRepository::class, \App\Repositories\CursoRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\SalaRepository::class, \App\Repositories\SalaRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\GridRepository::class, \App\Repositories\GridRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\FinanceRepository::class, \App\Repositories\FinanceRepositoryEloquent::class);
        //:end-bindings:
    }
}
