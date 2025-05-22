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
        "accessToken" => "n023qanifa2980npifa2nipofan2890npoafn92qnq90nfopanf20piq1nopfa"
        "expiresIn" => 3598
    ]
]
```

# Payment Methods
##### Request
```
$service = new \App\Services\N1co\PaymentMethod($token);
$response = $service->createPaymentMethod([
    "customer" => [
        "id"=> "rjgl",
        "name"=> "rjgl",
        "email"=> "rjgl@1co.com",
        "phoneNumber"=> "+5039632333"
      ],
    "card" => [
        "number"=> "4000000000011000",
        "expirationMonth"=> "12",
        "expirationYear"=> "2029",
        "cvv"=> "123",
        "cardHolder"=> "rjgl",
        "singleUse"=> false
      ]
]);
```

##### Response
```
[
  "status" => 200
  "data" => [
    "id" => "62cf1f321gseg1af23"
    "type" => "card"
    "bin" => [
      "brand" => "visa"
      "issuerName" => "INTL HDQTRS-CENTER OWNED"
      "countryCode" => "USA"
    ]
    "success" => true
    "message" => "El método de pago se creó exitosamente"
  ]
]
```

# Charges
##### Request
``<?
``

##### Response
``<?
``
# Locations
##### Request
``<?
``

##### Response
``<?
``
