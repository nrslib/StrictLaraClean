<?php

namespace App\Providers;

use App\Http\Middleware\CleanArchitectureMiddleware;
use App\Http\Presenters\User\UserCreatePresenter;
use App\Http\Presenters\User\UserGetListPresenter;
use Illuminate\Support\ServiceProvider;
use packages\UseCase\User\Create\UserCreatePresenterInterface;
use packages\UseCase\User\GetList\UserGetListPresenterInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Mock で実行したい場合はコメントアウト
        $this->registerForInMemory();

        // Mock で実行したい場合はコメント外す
//        $this->registerForMock();

        $this->app->singleton(CleanArchitectureMiddleware::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    private function registerForInMemory(){
        $this->app->singleton(
            \packages\Domain\Domain\User\UserRepositoryInterface::class,
            \packages\InMemoryInfrastructure\User\InMemoryUserRepository::class
        );

        $this->app->bind(
            \packages\UseCase\User\GetList\UserGetListUseCaseInterface::class,
            \packages\Domain\Application\User\UserGetListInteractor::class
        );
        $this->app->bind(
            UserGetListPresenterInterface::class,
            UserGetListPresenter::class
        );

        $this->app->bind(
            \packages\UseCase\User\Create\UserCreateUseCaseInterface::class,
            \packages\Domain\Application\User\UserCreateInteractor::class
        );
        $this->app->bind(
            UserCreatePresenterInterface::class,
            UserCreatePresenter::class
        );
    }

    private function registerForMock(){
        $this->app->bind(
            \packages\UseCase\User\GetList\UserGetListUseCaseInterface::class,
            \packages\MockInteractor\User\MockUserGetInteractor::class
        );
        $this->app->bind(
            UserGetListPresenterInterface::class,
            UserGetListPresenter::class
        );

        $this->app->bind(
            \packages\UseCase\User\Create\UserCreateUseCaseInterface::class,
            \packages\MockInteractor\User\MockUserCreateInteractor::class
        );
        $this->app->bind(
            UserCreatePresenterInterface::class,
            UserCreatePresenter::class
        );
    }
}
