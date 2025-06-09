<?php

namespace App\Services\N1co;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class paymentLink
{

    private string $accessToken;
    private string $paymentToken;

    public function __construct(string $accessToken, string $paymentToken)
    {
        $this->accessToken = $accessToken;
        $this->paymentToken = $paymentToken;
    }

    public function createPaymentLink(array $body)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://api-pay.n1co.shop/api/paymentlink/checkout', [
            'json' => $body,
            'headers' => [
                'Authorization' => 'Bearer sk_eaffe1569ce06571c66074ded39680f198fbb2f85b9a0704c90986bdbb0936ef',
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
