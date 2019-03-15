<?php


namespace App\Http\Controllers;


use http\Env\Request;
use packages\UseCase\User\Create\UserCreateRequest;
use packages\UseCase\User\Create\UserCreateUseCaseInterface;
use packages\UseCase\User\GetList\UserGetListRequest;
use packages\UseCase\User\GetList\UserGetListUseCaseInterface;

class StrictCleanUserController
{
    public function index(UserGetListUseCaseInterface $interactor)
    {
        $request = new UserGetListRequest(1, 10);
        $interactor->handle($request);
    }

    public function create(UserCreateUseCaseInterface $interactor, Request $request)
    {
        $name = $request->input('name');
        $request = new UserCreateRequest($name);
        $interactor->handle($request);
    }
}
