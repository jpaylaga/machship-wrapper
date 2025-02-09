<?php

namespace Jpaylaga\MachshipWrapper\Services;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

abstract class BaseMachshipService
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @throws Exception
     */
    protected function request(string $method, string $uri, array $options = [])
    {
        try {
            $response = $this->client->request($method, $uri, $options);

            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            throw new Exception("API Request failed", 0, $e);
        }
    }
}
