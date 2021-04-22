<?php

namespace Unit;

use Datenkraft\Backbone\SkuUsageClient\Client;
use PHPUnit\Framework\TestCase;

class testSkuUsageEndpoint extends TestCase
{
    private Client $object;

    protected function setUp(): void
    {
        require __DIR__ . '/../../vendor/autoload.php';
        parent::setUp();

        // $clientFactory = new ClientFactory([
        //  "clientId" => "asdfasdf",
        //  "clientSecret" => "asdfasdf",
        //  "oauthUrlAccessToken" => "https://auth.datenkraft.cloud/oauth/token",
        //  "oauthScopes" => [
        //      "sku-usage:add",
        //      ...
        //  ],
        //]);
        //$clientFactory->createClient(string $clientClass, string $endpointBaseUrl = null): \Jane\OpenApiRuntime\Client\Client {
        //  $client = $client::create();
        //
        //  return $client;
        //}

        $url = 'https://localhost:30280/';
        //$url = 'https://real url/';

        $httpClient = new \GuzzleHttp\Client(['verify' => false]);

        $plugins = [];
        $uri = \Http\Discovery\Psr17FactoryDiscovery::findUrlFactory()->createUri($url);
        $plugins[] = new \Http\Client\Common\Plugin\AddHostPlugin($uri);
        $plugins[] = new \Http\Client\Common\Plugin\HeaderAppendPlugin(['Authorization' => "helllo"]);

        $httpClient = new \Http\Client\Common\PluginClient($httpClient, $plugins);

        $this->object = Client::create($httpClient);
    }

    public function testGetOpenApi()
    {
        //$response = $this->object->getOpenApi();
        $response = $this->object->getOpenApi(\Datenkraft\Backbone\SkuUsageClient\Generated\Client::FETCH_RESPONSE);
        echo $response->getBody();
        //var_dump($response);
    }
}
