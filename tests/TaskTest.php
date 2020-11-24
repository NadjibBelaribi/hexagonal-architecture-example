<?php
declare(strict_types=1);

namespace Amir_nadjib\Todo_list\Tests;

use PHPUnit\Framework\TestCase;
use Amir_nadjib\Todo_list\Models\Task;

class TaskTest extends TestCase {
    private static $tasksTable = [
        'Apprendre JS' => ['Apprendre JS',1]
    ];
    public function testTaskExists() {
        $task = $this->createMock(Task::class);

        $task->method('taskExists')->will($this->returnCallback(
            function (string $title) {
                return array_key_exists($title, self::$tasksTable);
            }
        ));

        $this->assertTrue($task->taskExists('Apprendre JS'));
        $this->assertFalse($task->taskExists('Apprendre CSS'));
    }
}