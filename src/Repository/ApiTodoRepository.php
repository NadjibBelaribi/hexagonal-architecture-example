<?php


namespace Amir_nadjib\Todo_list\Repository;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;

class ApiTodoRepository //implements UserRepository
{
    private ClientInterface $httpClient;
    private RequestFactoryInterface $requestFactory;
    private StreamFactoryInterface $streamFactory;
    private string $apiEndpoint;

    public function __construct(ClientInterface $httpClient, RequestFactoryInterface $requestFactory, StreamFactoryInterface $streamFactory, string $apiEndpoint)
    {
        $this->httpClient = $httpClient;
        $this->requestFactory = $requestFactory;
        $this->streamFactory = $streamFactory;
        $this->apiEndpoint = $apiEndpoint;
    }

    public function getAllTasks(): array
    {
        $httpResponse = $this->httpClient->sendRequest(
            $this->requestFactory->createRequest('GET', $this->apiEndpoint . '/getTasks')
        );

        $jsonResponse = json_decode($httpResponse->getBody()->__toString());

        // On considère que l'utilisateur existe si le serveur a retourné un status code 200, qu'il a retourné au moins un item dans sa recherche
        if($httpResponse->getStatusCode() != 200) throw new ErrorApiException();
        return $jsonResponse ;
    }

    /*  public function insert(CreateAccountRequest $request): ?int
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
      }*/


}
