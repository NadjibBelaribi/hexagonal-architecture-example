
<?php
use PHPUnit\Framework\TestCase;
use \Amir_nadjib\Todo_list\Controllers\LoginController ;
final class Unit extends TestCase{
    public function testEgalite(): void
    {
        // Créer un bouchon pour la classe SomeClass.
        $stub = $this->createMock( LoginController::class);

        // Configurer le bouchon.
        $res = $stub->getUserByEmail('nadjib@web.dz')
            ->will('nadjib@web.dz');

        // Appeler $stub->doSomething() va maintenant retourner
        // 'foo'.
        $this->assertNotEquals('nadjib@web.dz', $res);
    }
}

