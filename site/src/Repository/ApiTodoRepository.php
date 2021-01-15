<?php


namespace Amir_nadjib\Todo_list\Repository;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Client\ClientExceptionInterface;
use GuzzleHttp\Psr7\Request ;
class ApiTodoRepository
{

     private Client $httpClient;
     private string $apiEndpoint;

    public function __construct(Client $httpClient, string $apiEndpoint)
    {
        $this->httpClient = $httpClient;
         $this->apiEndpoint = $apiEndpoint;
    }

    public function getAllTasks()
    {
        try {
            $httpResponse = $this->httpClient->request('GET',$this->apiEndpoint . '/getTasks');
            $jsonResponse =  json_decode($httpResponse->getBody()->getContents(), true);
            echo "Api sent " ;
            var_dump($jsonResponse);
            return json_encode($jsonResponse) ;
        } catch (GuzzleException $e) {
        }


    }

    /*
    public function insert(CreateAccountRequest $request): ?int
    {
        $httpResponse = $this->httpClient->sendRequest(
            $this->requestFactory->createRequest('POST', $this->apiEndpoint . '/users')
                ->withBody($this->streamFactory->createStream(
                // On suppose qu'on peut jsonencoder la réponse
                    json_encode($request)
                ))
        );

        if ($httpResponse->getStatusCode() !== 201) {
            return null; // non créée
        }

        $jsonResponse = json_decode($httpResponse->getBody()->__toString());

        // On suppose qu'on a cette propriété dans le payload de retour
        return $jsonResponse->newItemId;
    }
*/

}
