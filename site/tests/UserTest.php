<?php
declare(strict_types=1);

namespace Amir_nadjib\Todo_list\Tests;

use PHPUnit\Framework\TestCase;
use Amir_nadjib\Todo_list\Models\User;

class UserTest extends TestCase {
    private static $usersTableSample = [
        'nadjib' => ['nadjib',1]
    ];
    public function testUserExists() {
        $user = $this->createMock(User::class);

        $user->method('userExists')->will($this->returnCallback(
            function (string $username) {
                return array_key_exists($username, self::$usersTableSample);
            }
        ));

        $this->assertTrue($user->userExists('nadjib'));
        $this->assertFalse($user->userExists('amir'));
    }
}