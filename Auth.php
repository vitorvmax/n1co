<?php

namespace App\Services\N1co;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Auth
{
    private string $baseUrl = "https://api.n1co.com";

    public function getAccessToken(array $body): array
    {
        $url = $this->baseUrl . "/api/v2/Token";
        return $this->postRequest($url, $body);
    }

    private function postRequest(string $url, array $body): ?array
    {
        return $this->makeRequest('POST', $url, [
                "json" => $body,
            ]);
    }

    public function makeRequest(string $method, string $url, array $content = []): ?array
    {
        $options = [
            'base_uri' => $this->baseUrl,
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ],
        ];

        $client = new Client($options);


        try {
            $response = $client->request($method, $url, $content);
            $body = $response->getBody()->getContents();
            $data = json_decode($body, true);
            $statusCode = $response->getStatusCode();
            return ['status' => $statusCode, 'data' => $data];

        } catch (GuzzleException $e) {
            throw new \Exception("Erro na requisição: " . $e->getMessage());
        }
    }
}
