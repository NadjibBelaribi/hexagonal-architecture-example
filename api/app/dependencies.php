<?php

use Amir_nadjib\Todo_list\Repository\TodoInterfaceRepository;
use Amir_nadjib\Todo_list\Repository\TodoRepository;
use Amir_nadjib\Todo_list\Repository\ApiTodoRepository;

use DI\ContainerBuilder;
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

        ApiTodoRepository::class => function (): ApiTodoRepository {
            return new ApiTodoRepository(
            // classes dispo dans la librairie php-http/discovery
            // permettent de scanner les dépendances et trouver automatiquement des classes http qui implémentent les PSR
            // Tel que Guzzle par exemple. A noter, vous devez composer require guzzle. En effet, si la discovery ne trouve
            // pas de classe compatible, alors elle va throw une exception
                \Http\Discovery\Psr18ClientDiscovery::find(),
                \Http\Discovery\Psr17FactoryDiscovery::findRequestFactory(),
                \Http\Discovery\Psr17FactoryDiscovery::findStreamFactory(),
                'localhost:8003/' // Url de base de l'api
            );
          }
        ]);

    return $containerBuilder->build();
};
