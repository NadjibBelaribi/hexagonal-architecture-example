<?php

namespace Tests\Hakan\Hello\Features\CreateAccount;

use Amir_nadjib\Todo_list\Features\TaskDetail\TaskDetailRequest;
use Amir_nadjib\Todo_list\Features\TaskDetail\MissingInputParametersException;

use PHPUnit\Framework\TestCase;
use stdClass;

class TaskDetailRequestTest extends TestCase
{
    public function testShouldThrowExceptionWhenParamsNotFilled(): void
    {
        $this->expectException(MissingInputParametersException::class);
        $stdClass = new stdClass();
        $stdClass->email = 'nadjib@amir.dz';
        TaskDetailRequest::from($stdClass);
    }

    public function testShouldCreateRequestWithProperties(): void
    {
        $stdClass = new stdClass();
         $stdClass->taskId = '2021';
        $request = TaskDetailRequest::from($stdClass);

        $this->assertSame(intval('2021'), $request->getTaskId());
     }

}
