<?php

declare (strict_types=1);


namespace App\Service;


class CreateUserCommand
{
    private string $firstName;

    private string $lastName;

    private string $username;

    public function __construct(string $firstName, string $lastName, string $username)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->username = $username;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getUsername(): string
    {
        return $this->username;
    }


}