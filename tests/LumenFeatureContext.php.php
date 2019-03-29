<?php
namespace App\Tests;

use TestCase;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use GuzzleHttp\Client;

class LumenFeatureContext extends TestCase implements Context, SnippetAcceptingContext
{
    protected $client;

    protected $response;

    protected $base_uri = 'http://127.0.0.1/api/';

    public function __construct()
    {
        $client_params = [
            'base_uri' => $this->base_uri
        ];
        $this->client = new Client($client_params);
    }
}