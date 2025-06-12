<?php

namespace App\Services\N1co;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class PaymentLink
{

    private string $clientId;
    private string $clientSecret;
    private ?string $accessToken;
    private string $paymentToken;

    public function __construct(string $clientId, string $clientSecret, string $paymentToken, string $accessToken = null)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->accessToken = $accessToken;
        $this->paymentToken = $paymentToken;
    }

    public function getAccessToken()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://api.n1co.com/api/v2/Token', [
            'json' => [
                'clientId' => $this->clientId,
                'clientSecret' => $this->clientSecret,
            ],
            'headers' => [
                'Authorization' => 'Bearer ' . $this->paymentToken,
                'Content-Type' => 'application/json',
            ],
        ]);
        $body = $response->getBody()->getContents();
        $data = json_decode($body, true);
        $statusCode = $response->getStatusCode();
        return ['status' => $statusCode, 'data' => $data];

    }

    public function createPaymentLink(array $body)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://api-pay.n1co.shop/api/paymentlink/checkout', [
            'json' => $body,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->paymentToken,
                'Content-Type' => 'application/json',
            ],
        ]);
        $body = $response->getBody()->getContents();
        $data = json_decode($body, true);
        $statusCode = $response->getStatusCode();
        return ['status' => $statusCode, 'data' => $data];

    }

    public function refound(array $data)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://api.n1co.com/api/v2/Refunds', [
            'json' => $data,
            'headers' => [
                'Authorization' => 'Bearer '. $this->accessToken,
                'Content-Type' => 'application/json',
            ],
        ]);
        $body = $response->getBody()->getContents();
        $data = json_decode($body, true);
        $statusCode = $response->getStatusCode();
        return ['status' => $statusCode, 'data' => $data];
    }
}