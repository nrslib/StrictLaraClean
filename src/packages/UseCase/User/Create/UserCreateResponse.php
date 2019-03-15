<?php

namespace packages\UseCase\User\Create;


class UserCreateResponse
{
    /**
     * @var string
     */
    private $createdUserId;

    /**
     * @var string
     */
    private $userName;

    /**
     * UserCreateResponse constructor.
     * @param string $createdUserId
     * @param string $userName
     */
    public function __construct(string $createdUserId, string $userName)
    {
        $this->createdUserId = $createdUserId;
        $this->userName = $userName;
    }

    /**
     * @return string
     */
    public function getCreatedUserId(): string
    {
        return $this->createdUserId;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }
}
