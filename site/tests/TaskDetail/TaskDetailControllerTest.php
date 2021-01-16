<?php

namespace Tests\Hakan\Hello\Features\CreateAccount;

use Amir_nadjib\Todo_list\Features\TaskDetail\TaskDetailController;
use Amir_nadjib\Todo_list\Features\TaskDetail\TaskDetailRequest;
use Amir_nadjib\Todo_list\Features\TaskDetail\TaskDetailService;
use Http\Discovery\Psr17FactoryDiscovery;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\Twig;

class TaskDetailControllerTest extends TestCase
{
    private TaskDetailService $service;

    /*public function setUp(): void
    {
        $this->service = $this->createMock(TaskDetailService::class);
    }

    public function testShouldReturn409WhenUserAlreadyExistExceptionIsThrown(): void
    {
        $this->service->expects($this->once())->method('handle')->willThrowException(new UserAlreadyExistException());
        $response = $this->invokeWith(__DIR__ . '/payloads/valid-payload.json');
        $this->assertSame(409, $response->getStatusCode());
    }

    public function testShouldReturn400WhenMissingInputParametersException(): void
    {
        $response = $this->invokeWith(__DIR__ . '/payloads/missing-property.json');
        // La factory de request doit throw une MissingInputParametersException catchée dans le controleur
        $this->assertSame(400, $response->getStatusCode());
    }

    public function testShouldReturn400WhenInsertionInDBFailed(): void
    {
        $this->service->expects($this->once())->method('handle')->willThrowException(new CouldNotInsertUserException());
        $response = $this->invokeWith(__DIR__ . '/payloads/valid-payload.json');
        $this->assertSame(400, $response->getStatusCode());
    }

    public function testShouldReturn201CreatedWhenServiceSucceeded(): void
    {
        $this->service->expects($this->once())->method('handle')->with(
            new TaskDetailRequest('hakan&ebabil.fr')
        )->willReturn(12);

        $response = $this->invokeWith(__DIR__ . '/payloads/valid-payload.json');
        $this->assertSame(201, $response->getStatusCode());
    }*/


}
