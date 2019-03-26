<?php

namespace packages\Domain\Application\User;

use App\Http\Presenters\User\UserCreatePresenter;
use packages\Domain\Domain\User\UserRepositoryInterface;
use packages\Domain\Domain\User\User;
use packages\Domain\Domain\User\UserId;
use packages\UseCase\User\Create\UserCreatePresenterInterface;
use packages\UseCase\User\Create\UserCreateUseCaseInterface;
use packages\UseCase\User\Create\UserCreateRequest;
use packages\UseCase\User\Create\UserCreateResponse;

class UserCreateInteractor implements UserCreateUseCaseInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;
    /**
     * @var UserCreatePresenter
     */
    private $presenter;

    /**
     * UserCreateInteractor constructor.
     * @param UserRepositoryInterface $userRepository
     * @param UserCreatePresenterInterface $presenter
     */
    public function __construct(UserRepositoryInterface $userRepository, UserCreatePresenterInterface $presenter)
    {
        $this->userRepository = $userRepository;
        $this->presenter = $presenter;
    }

    /**
     * @param UserCreateRequest $request
     * @return void
     */
    public function handle(UserCreateRequest $request)
    {
        $userId = new UserId(uniqid());
        $userName = $request->getName();
        $createdUser = new User($userId, $userName);
        $this->userRepository->save($createdUser);

        $response = new UserCreateResponse($userId->getValue(), $userName);
        $this->presenter->output($response);
    }
}
