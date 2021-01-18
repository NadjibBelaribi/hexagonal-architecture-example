<?php

use Amir_nadjib\Todo_list\Repository\TodoInterfaceRepository;
use Amir_nadjib\Todo_list\Repository\TodoRepository;

use DI\ContainerBuilder;
use function DI\get;

return function () : \DI\Container {

    $containerBuilder = new ContainerBuilder();
    $containerBuilder->addDefinitions([
        PDO::class => function () : PDO
        {
            $host = $_ENV['DB_HOST'];
            $port = $_ENV['DB_PORT'];
            $name = $_ENV['DB_NAME'];
            $user = $_ENV['DB_USER'];
            $pass = $_ENV['DB_PASS'];

            $dsn = "mysql:host=$host;port=$port;dbname=$name;charset=utf8;";
            return new PDO($dsn, $user, $pass, [ PDO::ATTR_PERSISTENT => false ]);
        },

        TodoInterfaceRepository::class => get(TodoRepository::class)
        ]);

    return $containerBuilder->build();
};
