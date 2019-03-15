<?php


namespace packages\UseCase\User\Create;


/**
 * Interface UserCreatePresenterInterface
 * @package packages\UseCase\User\Create
 */
interface UserCreatePresenterInterface
{
    /**
     * @param UserCreateResponse $outputData
     * @return mixed
     */
    public function output(UserCreateResponse $outputData);
}
