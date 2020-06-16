<?php

declare (strict_types=1);


namespace App\Service;


use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class CreateUserCommandHandler implements MessageHandlerInterface
{

    private UserRepository $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke(CreateUserCommand $createUserCommand): void
    {
        $firstName = $createUserCommand->getFirstName();
        $lastName = $createUserCommand->getLastName();
        $username = $createUserCommand->getUsername();

        $user = User::createUser(
            $firstName,
            $lastName,
            $username
        );

        $this->userRepository->save($user);

        // TODO: Implement __invoke() method.

        sleep(15);
        $filesystem = new Filesystem();
        $filesystem->appendToFile('./CreateUserCommandAfter.log', 'Date: '.date("Y-m-d H:i:s")."\n\n");

    }
}