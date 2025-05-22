## PHP classes to work with N1co

#### Guzzle is required
#### Consider changing the class namespace if you are going to use a directory other than \App\Services

# Authentication
``
    $service = new \App\Services\N1co\Auth();
    ``
    <br>
    ``
    $token = $service->getAccessToken(
        [
            'clientId' => 'VALUE',
            'clientSecret' => 'VALUE',
        ]
    );
``

##### Response
``
    [
        "status" => 200
          "data" => [
            "tokenType" => "Bearer"
            "accessToken" => "n023qanifa2980npifa2nipofan2890npoafn92qnq90nfopanf20piq1nopfa"
            "expiresIn" => 3598
        ]
    ]
``

# Payment Cards
``<?
``

##### Response
``<?
``

# Charges
``<?
``

##### Response
``<?
``
# Locations
``<?
``

##### Response
``<?
``
