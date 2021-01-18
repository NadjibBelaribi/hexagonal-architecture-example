<?php
declare(strict_types=1);

namespace Amir_nadjib\Todo_list\Repository;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
class ApiTodoRepository
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
        $apiRequest = $this->requestFactory->createRequest('GET', $this->apiEndpoint . '/getTasks');

        $apiResponse = $this->httpClient->sendRequest($apiRequest);

        if ($apiResponse->getStatusCode() !== 200) {
            return [];
        }

        $jsonResponse = json_decode($apiResponse->getBody()->__toString());
        $tasks = [];
        foreach ($jsonResponse as $task) {
            $tasks[] = array(
                'id' => $task->id,
                 'title' => $task->title
            );
        }

        return $tasks;
    }


}
