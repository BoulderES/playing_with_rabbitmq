<?php

declare (strict_types=1);


namespace App\Controller;


use App\Service\CreateUserCommand;
use App\Service\CreateUserCommandHandler;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController
{
    /**
     * @Route("/", defaults={}, name="index")
     * @param Request $request
     * @param CreateUserCommandHandler $commandHandler
     * @param MessageBusInterface $bus
     * @return JsonResponse
     */
    public function index(Request $request, CreateUserCommandHandler $commandHandler, MessageBusInterface $bus): JsonResponse
    {
        $createUserCommand = new CreateUserCommand(
                $request->query->get("firstName"),
                $request->query->get("lastName"),
                $request->query->get("username")
        );

//        $commandHandler->__invoke($createUserCommand);
        $bus->dispatch($createUserCommand);

        return new JsonResponse("Hello world!");
    }
}