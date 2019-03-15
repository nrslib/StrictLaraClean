<?php

namespace packages\MockInteractor\User;


use App\Http\Presenters\User\UserGetListPresenter;
use packages\UseCase\User\GetList\UserGetListUseCaseInterface;
use packages\UseCase\User\GetList\UserGetListRequest;
use packages\UseCase\User\GetList\UserGetListResponse;
use packages\User\Commons\UserModel;

class MockUserGetInteractor implements UserGetListUseCaseInterface
{
    /**
     * @var UserGetListPresenter
     */
    private $presenter;

    /**
     * MockUserGetInteractor constructor.
     * @param UserGetListPresenter $presenter
     */
    public function __construct(UserGetListPresenter $presenter)
    {
        $this->presenter = $presenter;
    }

    /**
     * @param UserGetListRequest $request
     * @return void
     */
    public function handle(UserGetListRequest $request)
    {
        $users = [
            new UserModel('1', 'test-user-1'),
            new UserModel('2', 'test-user-2')
        ];
        $this->presenter->output(new UserGetListResponse($users));
    }
}
