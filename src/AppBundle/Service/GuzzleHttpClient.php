<?php
/**
 * Created by PhpStorm.
 * User: sumaya
 * Date: 27/03/18
 * Time: 9:45 AM
 */

namespace AppBundle\Service;
use \GuzzleHttp\Client;

class GuzzleHttpClient implements HttpClientInterface
{

    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function get($url)
    {
        $response = $this->client->get($url);
        return json_decode($response->getBody(), true);

    }

    public function post($url, $data)
    {
        //TODO: Implement post method.
    }

}