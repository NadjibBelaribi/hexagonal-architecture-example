<?php

use Amir_nadjib\Todo_list\Repository\ApiTodoRepository;
use Amir_nadjib\Todo_list\Repository\TodoInterfaceRepository;
use Amir_nadjib\Todo_list\Repository\TodoRepository;
use DI\ContainerBuilder;
use Http\Discovery\Psr18ClientDiscovery;
use Http\Discovery\Psr17FactoryDiscovery;
use GuzzleHttp\Client ;
use Slim\Views\Twig;
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
        Twig::class => function (): Twig {
            return Twig::create(__DIR__ . '/../views', [ 'cache' => false ]);
        },

        TodoInterfaceRepository::class => get(TodoRepository::class),
        // Notez commment on a très facilement modifié la source de l'information ici
        // Le reste du programme n'a pas changé, seul la répo est remplacé par une autre
        // implémentation concrète
        ApiTodoRepository::class => function (): ApiTodoRepository {
                return new ApiTodoRepository(
                    Psr18ClientDiscovery::find(),
                    Psr17FactoryDiscovery::findRequestFactory(),
                    Psr17FactoryDiscovery::findStreamFactory(),
                    'http://todoApi'
                );

            }


    ]);

    return $containerBuilder->build();
};
