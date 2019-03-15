<?php


namespace App\Http\Presenters\User;


use App\Http\Middleware\CleanArchitectureMiddleware;
use App\Http\Models\User\Create\UserCreateViewModel;
use packages\UseCase\User\Create\UserCreatePresenterInterface;
use packages\UseCase\User\Create\UserCreateResponse;

class UserCreatePresenter implements UserCreatePresenterInterface
{
    public function output(UserCreateResponse $outputData)
    {
        $viewModel = new UserCreateViewModel($outputData->getCreatedUserId(), $outputData->getUserName());
        CleanArchitectureMiddleware::$view = view('user.create', compact('viewModel'));
    }
}
