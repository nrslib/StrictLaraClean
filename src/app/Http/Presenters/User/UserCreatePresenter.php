<?php


namespace App\Http\Presenters\User;


use App\Http\Middleware\CleanArchitectureMiddleware;
use App\Http\Models\User\Create\UserCreateViewModel;
use packages\UseCase\User\Create\UserCreatePresenterInterface;
use packages\UseCase\User\Create\UserCreateResponse;

class UserCreatePresenter implements UserCreatePresenterInterface
{
    /**
     * @var CleanArchitectureMiddleware
     */
    private $middleware;

    /**
     * UserCreatePresenter constructor.
     * @param CleanArchitectureMiddleware $middleware
     */
    public function __construct(CleanArchitectureMiddleware $middleware)
    {
        $this->middleware = $middleware;
    }

    public function output(UserCreateResponse $outputData)
    {
        $viewModel = new UserCreateViewModel($outputData->getCreatedUserId(), $outputData->getUserName());
        $this->middleware->setData(view('user.create', compact('viewModel')));
    }
}
