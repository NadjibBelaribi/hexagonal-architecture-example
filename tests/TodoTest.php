<?php
declare(strict_types=1);

namespace Amir_nadjib\Todo_list\Tests;

use PHPUnit\Framework\TestCase;
use Amir_nadjib\Todo_list\Models\User;

class TodoTest extends TestCase {
    private static $usersTableSample = [
        'nadjib' => ['nadjib',1]
    ];

    /*public function testUserLogin() {
        $user = $this->createMock(User::class);

        $user->method('userLogin')->will($this->returnCallback(
            function (string $username, string $password) {
                if (array_key_exists($username, self::$usersTableSample)) {
                    if (self::$usersTableSample[$username][0] == $password) {
                        return self::$usersTableSample[$username][1];
                    }
                }
                return -1;
            }
        ));

        $this->assertEquals(1, $user->userLogin('root','root'));
        $this->assertEquals(-1, $user->userLogin('root','fake'));
        $this->assertEquals(-1, $user->userLogin('fake','fake'));
    }*/

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