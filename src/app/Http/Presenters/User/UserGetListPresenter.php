<?php


namespace App\Http\Presenters\User;


use App\Http\Middleware\CleanArchitectureMiddleware;
use App\Http\Models\User\Commons\UserViewModel;
use App\Http\Models\User\Index\UserIndexViewModel;
use packages\UseCase\User\GetList\UserGetListPresenterInterface;
use packages\UseCase\User\GetList\UserGetListResponse;

class UserGetListPresenter implements UserGetListPresenterInterface
{
    /**
     * @param UserGetListResponse $outputData
     * @return mixed
     */
    public function output(UserGetListResponse $outputData)
    {
        $users = array_map(
            function ($x) {
                return new UserViewModel($x->id, $x->name);
            },
            $outputData->users
        );
        $viewModel = new UserIndexViewModel($users);
        CleanArchitectureMiddleware::$view = view('user.index', compact('viewModel'));
    }
}
