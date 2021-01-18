<?php

namespace Amir_nadjib\Todo_list\Endpoints\NotFound ;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;


class NotFoundController
{

    public function get(RequestInterface $request, ResponseInterface $response)
    {
        echo "Undefined route, try /getTasks";
        return $response->withStatus(200);
    }

}