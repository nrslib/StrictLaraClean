<?php

namespace packages\MockInteractor\User;


use packages\UseCase\User\Create\UserCreatePresenterInterface;
use packages\UseCase\User\Create\UserCreateUseCaseInterface;
use packages\UseCase\User\Create\UserCreateRequest;
use packages\UseCase\User\Create\UserCreateResponse;

/**
 * Class MockUserCreateInteractor
 * @package packages\MockInteractor\User
 */
class MockUserCreateInteractor implements UserCreateUseCaseInterface
{
    /**
     * @var UserCreatePresenterInterface
     */
    private $presenter;

    /**
     * MockUserCreateInteractor constructor.
     * @param UserCreatePresenterInterface $presenter
     */
    public function __construct(UserCreatePresenterInterface $presenter)
    {
        $this->presenter = $presenter;
    }

    /**
     * @param UserCreateRequest $request
     * @return void
     */
    public function handle(UserCreateRequest $request)
    {
        $this->presenter->output(new UserCreateResponse('test-id', 'mock-created-user'));
    }
}
