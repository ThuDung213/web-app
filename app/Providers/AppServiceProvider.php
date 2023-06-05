<?php

namespace App\Providers;

use App\Repositories\Client\ClientRepository;
use App\Repositories\Client\ClientRepositoryInterface;

use App\Repositories\Project\ProjectRepository;
use App\Repositories\Project\ProjectRepositoryInterface;
use App\Repositories\Task\TaskRepository;
use App\Repositories\Task\TaskRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Service\Client\ClientService;
use App\Service\Client\ClientServiceInterface;
use App\Service\Project\ProjectService;
use App\Service\Project\ProjectServiceInterface;
use App\Service\Task\TaskService;
use App\Service\Task\TaskServiceInterface;
use App\Service\User\UserService;
use App\Service\User\UserServiceInterface;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Project
        $this->app->singleton(
            ProjectRepositoryInterface::class,
            ProjectRepository::class
        );
        $this->app->singleton(
            ProjectServiceInterface::class,
            ProjectService::class,
        );

        //Client
        $this->app->singleton(
            ClientRepositoryInterface::class,
            ClientRepository::class
        );
        $this->app->singleton(
            ClientServiceInterface::class,
            ClientService::class
        );

        //Task
        $this->app->singleton(
            TaskRepositoryInterface::class,
            TaskRepository::class
        );
        $this->app->singleton(
            TaskServiceInterface::class,
            TaskService::class
        );

        //User
        $this->app->singleton(
            UserRepositoryInterface::class,
            UserRepository::class
        );
        $this->app->singleton(
            UserServiceInterface::class,
            UserService::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
