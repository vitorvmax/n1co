## PHP classes to work with N1co

#### Guzzle and Carbon is required
#### Consider changing the class namespace if you are going to use a directory other than \App\Services

# Authentication
##### Request
```
$service = new \App\Services\N1co\PaymentMethod($clientId, $clientSecret, $paymentToken);
$token = $service->getAccessToken(
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
$service = new \App\Services\N1co\PaymentLink($clientId, $clientSecret, $paymentToken, $accessToken);
$response = $service->createPaymentLink([
    "orderName" => "Nome da cobrança",
    "orderDescription" => "Descrição da cobrança",
    "amount" => 0.2,
    "expirationDateTime" => Carbon::now()->addMinutes(5)->toIso8601ZuluString(),
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
$service = new \App\Services\N1co\PaymentLink($clientId, $clientSecret, $paymentToken, $accessToken);
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

# Webhook


## Link de pagamento criado
```
{
    "orderId":"39411788"
    "orderReference":NULL
    "description":"La orden fue creada"
    "metadata":NULL
    "level":"Info"
    "type":"Created"
}
```

## Pagamento efetuado
```
{
    "orderId":string"3955763"
    "orderReference":NULL
    "description":"La orden fue pagada exitosamente autorización: IKXPCM"
    "metadata":{
        "PaymentId":"1f4ef1e-45ed-8fe7-c0b55ca25d4c"
        "ChargeId":"144-4e21-ac47-a96add5bdf83"
        "Status":"SUCCEEDED"
        "AuthorizationCode":"IKDEPCM"
        "SequentialNumber":"214512512521"
        "AccountId":string"hugoapp.h4b"
        "PaymentProcessor":"serfinsa"
        "PaymentProcessorReference":"516012868998"
        "TransactionDate":"2025-06-09T12:14:12.8910641Z"
        "PaidAmount":".20"
        "BuyerName":"Vitor "
        "BuyerPhone":"+5519981346098"
        "BuyerEmail":"email@gmail.com"
        "CheckoutNote":"N/A"
        "OrderReference":""
        "OrderTotalDetails":{
        "subtotal":string"0.2000"
        "shippingAmount":"0.0000"
        "discountAmount":"0"
        "surchargeAmount":"0"
        "total":"0.20"
    }
    "IsManagedPaymentMethod":false
    "InvoiceName":""
    "InvoiceAddress":""
    "InvoiceTaxCode":"C/F"
    }
    "level":"Info"
    "type":"SuccessPayment"
}
```

## Pagamento reembolsado
```
{
"orderId": "3955763"
"orderReference":
"description":string"La orden fue cancelada, motivo: Teste de reembolso"
"metadata":NULL
"level":string"Info"
"type":string"Cancelled"
}

```
