## PHP classes to work with N1co

#### Guzzle is required
#### Consider changing the class namespace if you are going to use a directory other than \App\Services

# Authentication
##### Request
```
$service = new \App\Services\N1co\Auth();
$token = $service->getAccessToken(
    [
        'clientId' => 'VALUE',
        'clientSecret' => 'VALUE',
    ]
);
```

##### Response
```
[
    "status" => 200
      "data" => [
        "tokenType" => "Bearer"
        "accessToken" => "n023qanifa2980npifa2nipofan28903gsdg34afn92qnq90nfopanf20piq1nopfa"
        "expiresIn" => 3598
    ]
]
```

# Payment Link
##### Request
```
$service = new \App\Services\N1co\PaymentLink($token, $paymentToken);
$response = $service->createPaymentLink([
    "orderName" => "Nome da cobrança",
    "orderDescription" => "Descrição da cobrança",
    "amount" => 0.2,
]);
```

##### Response
```
[
  "status" => 200
  "data" => [
    "orderCode" => "zA2NY41uY4"
    "orderId" => 3955763
    "paymentLinkUrl" => "https://pay.n1co.shop/zA2N124Y4"
  ]
]
```

# Refound
##### Request
```
$service = new \App\Services\N1co\PaymentLink($token, $paymentToken);
$response = $service->refound([
    "orderId" => "3955735",
    "cancellationReason" => "Motivo do reembolso",
]);
```

##### Response
```
 [
  "status" => 200
  "data" => [
    "success" => true
    "message" => "Su orden ha sido cancelada y su pago reintegrado"
    "orderId" => "3955763"
    "status" => "SUCCEEDED"
    "amount" => 0.2
    "currency" => "USD"
  ]
]
```
