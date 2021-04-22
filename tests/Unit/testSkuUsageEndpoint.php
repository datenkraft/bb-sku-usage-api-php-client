<?php

namespace Unit;

use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\SkuUsageApi\Client;
use PHPUnit\Framework\TestCase;

class testSkuUsageEndpoint extends TestCase
{
    private $object;

    protected function setUp(): void
    {
        //require __DIR__ . '/../../vendor/autoload.php';
        parent::setUp();

        $oAuthTokenUrl = 'https://localhost:30250/oauth/token';

        // Valid clientId, clientSecret and requested scopes
        $clientId = '934186c9-c3bb-49c5-a050-47bfbe325515';
        $clientSecret = 'lzsGABpnE7C7E6srCSbXtkWuIkXmv3DwlfwTzxh0';
        $oAuthScopes = [];
        $config['clientId'] = $clientId;
        $config['clientSecret'] = $clientSecret;
        $config['oauthScopes'] = $oAuthScopes;
        $config['oAuthTokenUrl'] = $oAuthTokenUrl;

        $factory = new ClientFactory($config);

        $this->object = $factory->createClient(Client::class, 'https://localhost:30280');


    }

    public function testGetOpenApi()
    {
        //$response = $this->object->getOpenApi();
        $response = $this->object->getOpenApi(\Datenkraft\Backbone\Client\SkuUsageApi\Generated\Client::FETCH_RESPONSE);
        echo $response->getBody();
        //var_dump($response);
    }
}
