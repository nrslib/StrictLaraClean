<?php


namespace packages\UseCase\User\GetList;


/**
 * Interface UserGetListPresenterInterface
 * @package packages\UseCase\User\GetList
 */
interface UserGetListPresenterInterface
{
    /**
     * @param UserGetListResponse $outputData
     * @return mixed
     */
    public function output(UserGetListResponse $outputData);
}
