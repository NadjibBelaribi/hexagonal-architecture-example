<?php

namespace Tests\Hakan\Hello\Features\CreateAccount;
use Amir_nadjib\Todo_list\Features\TaskDetail\TaskDetailService;
use PHPUnit\Framework\TestCase;

 class TaskDetailServiceTest extends TestCase
{
     public function testShouldThrowUserAlreadyExistException(): void
     {
         $this->expectException(UserAlreadyExistException::class);

         $userRepository = $this->createMock(UserRepository::class);
         $userRepository->expects($this->once())->method('exists')
             ->with('hakan@ebabil.fr')
             ->willReturn(true);

         $service = new CreateAccountService($userRepository);

         $service->handle(
             new CreateAccountRequest('hakan@ebabil.fr', 'motDePasseBidon')
         );
     }

     public function testShouldThrowCouldNotInsertUserException(): void
     {
         $this->expectException(CouldNotInsertUserException::class);

         $request = new CreateAccountRequest('hakan@ebabil.fr', 'motDePasseBidon');

         $userRepository = $this->createMock(UserRepository::class);
         $userRepository->expects($this->once())->method('exists')
             ->with('hakan@ebabil.fr')
             ->willReturn(false);

         $userRepository->expects($this->once())->method('insert')
             ->with($request)
             ->willReturn(null);

         $service = new CreateAccountService($userRepository);

         $service->handle($request);
     }

     public function testShouldReturnResponse(): void
     {
         $request = new CreateAccountRequest('hakan@ebabil.fr', 'motDePasseBidon');

         $userRepository = $this->createMock(UserRepository::class);
         $userRepository->expects($this->once())->method('exists')
             ->with('hakan@ebabil.fr')
             ->willReturn(false);

         $userRepository->expects($this->once())->method('insert')
             ->with($request)
             ->willReturn(12);

         $service = new CreateAccountService($userRepository);

         $response = $service->handle($request);
          $this->assertSame(12, $response->getUserId());
     }
 }
