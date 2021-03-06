<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use packages\UseCase\User\Create\UserCreateUseCaseInterface;
use packages\UseCase\User\Create\UserCreateRequest;
use packages\UseCase\User\GetList\UserGetListUseCaseInterface;
use packages\UseCase\User\GetList\UserGetListRequest;

class UserController extends BaseController
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
