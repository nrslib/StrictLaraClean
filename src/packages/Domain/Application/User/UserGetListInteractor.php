<?php

namespace packages\Domain\Application\User;

use packages\Domain\Domain\User\UserRepositoryInterface;
use packages\UseCase\User\GetList\UserGetListPresenterInterface;
use packages\UseCase\User\GetList\UserGetListUseCaseInterface;
use packages\UseCase\User\GetList\UserGetListRequest;
use packages\UseCase\User\GetList\UserGetListResponse;
use packages\User\Commons\UserModel;

class UserGetListInteractor implements UserGetListUseCaseInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;
    /**
     * @var UserGetListPresenterInterface
     */
    private $userGetListPresenter;

    /**
     * UserCreateInteractor constructor.
     * @param UserRepositoryInterface $userRepository
     * @param UserGetListPresenterInterface $userGetListPresenter
     */
    public function __construct(UserRepositoryInterface $userRepository, UserGetListPresenterInterface $userGetListPresenter)
    {
        $this->userRepository = $userRepository;
        $this->userGetListPresenter = $userGetListPresenter;
    }

    /**
     * @param UserGetListRequest $request
     * @return void
     */
    public function handle(UserGetListRequest $request)
    {
        $users = $this->userRepository->findByPage($request->getPage(), $request->getSize());

        $userModels = array_map(
            function ($x) {
                return new UserModel($x->id, $x->name);
            },
            $users
        );

        $outputData = new UserGetListResponse($userModels);
        $this->userGetListPresenter->output($outputData);
    }
}
