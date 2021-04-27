<?php

namespace Unit;

use Datenkraft\Backbone\Client\BaseApi\ClientFactory;
use Datenkraft\Backbone\Client\SkuUsageApi\Client;
use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\SkuUsageBase;
use Datenkraft\Backbone\Client\SkuUsageApi\Generated\Model\SkuUsageMeta;
use PHPUnit\Framework\TestCase;

class testSkuUsageEndpoint extends TestCase
{
    private $object;

    protected function setUp(): void
    {
//        //require __DIR__ . '/../../vendor/autoload.php';
//        parent::setUp();
//
//        $oAuthTokenUrl = 'https://bb_authorization_api:3000/oauth/token';
//
//        // Valid clientId, clientSecret and requested scopes
//        $clientId = '9348d5e5-207b-4007-b04b-2de94c23a661';
//        $clientSecret = 'VzWDpPwsGAkdaekYTQI0iAm919sgkp2QxbyFHTIH';
//        $oAuthScopes = ['sku-usage:add'];
//        $config['clientId'] = $clientId;
//        $config['clientSecret'] = $clientSecret;
//        $config['oAuthScopes'] = $oAuthScopes;
//        $config['oAuthTokenUrl'] = $oAuthTokenUrl;
//
//        $factory = new ClientFactory($config);
//
//        $this->object = $factory->createClient(Client::class, 'https://bb_sku_usage_api:3000');
    }

    public function testGetOpenApi()
    {
        //$response = $this->object->getOpenApi();
//        $data = [];
//
//        $meta = new SkuUsageMeta();
//        $meta->setAmount(101)->setCurrency('EUR')->setDescription('description');
//
//        $base = new SkuUsageBase();
//        $base->setExternalId('12')
//            ->setMeta($meta)
//            ->setProjectId('2')
//            ->setQuantity(1)
//            ->setSkuId('ab')
//            ->setUsageEnd(new \DateTime())
//            ->setUsageStart(new \DateTime());
//
//        $base2 = new SkuUsageBase();
//        $base2->setExternalId('14')
//            ->setMeta($meta)
//            ->setProjectId('2')
//            ->setQuantity(1)
//            ->setSkuId('ab')
//            ->setUsageEnd(new \DateTime())
//            ->setUsageStart(new \DateTime());
//
//        $data[] = $base;
//        $data[] = $base2;
//        $response = $this->object->addSkuUsage(
//            $data,
//            \Datenkraft\Backbone\Client\SkuUsageApi\Generated\Client::FETCH_RESPONSE
//        );
//        echo "Response:";
//        echo $response->getBody();
//        //var_dump($response);
    }
}
