<?php
namespace App\Tests\Api;

use Behat\Gherkin\Node\PyStringNode;
use Behat\Behat\Tester\Exception\PendingException;
use App\Tests\LumenFeatureContext;
use PHPUnit\Framework\Assert as PHPUnit;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Client;

class ApiFeatureContext extends LumenFeatureContext
{
    protected $client;

    protected $response;

    protected $headers =[];

    protected $base_uri = 'http://127.0.0.1/api/';

    /**
     * @Given I want to search gifs
     */
    public function iWantToSearchGifs()
    {
        $client_params = [
            'base_uri' => $this->base_uri
        ];
        $this->client = new Client($client_params);
    }

    /**
     * @Given I have a valid API Token
     */
    public function iHaveAValidApiToken()
    {
        $this->headers = ['headers' => ['API-TOKEN' => 'VALIDTOKEN']];
    }

    /**
     * @When I search :term
     */
    public function iSearch($term)
    {
        try {
            $this->response  = $this->client->request('GET', 'search/'.$term, $this->headers);
        } catch (ClientException $e) {
            if ($e->hasResponse()) {
                $this->response = $e->getResponse();
            }
        }
    }

    /**
     * @Then I should get:
     */
    public function iShouldGet(PyStringNode $string)
    {
        $expected = json_decode($string, true);
        $actual = json_decode($this->response->getBody(), true);
        PHPUnit::assertEquals($expected, $actual);
    }
    /**
     * @Then I should get a :code Response Code with Status :statusPhrase
     */
    public function iShouldGetAResponseCodeWithStatus($code, $statusPhrase)
    {
        PHPUnit::assertEquals($code, $this->response->getStatusCode());
        PHPUnit::assertEquals($statusPhrase, $this->response->getReasonPhrase());
    }

    /**
     * @Given I have a invalid API Token
     */
    public function iHaveAInvalidApiToken()
    {
        $this->headers = ['headers' => ['API-TOKEN' => 'INVALIDTOKEN']];
    }

    /**
     * @When I visit the random endpoint
     */
    public function iVisitTheRandomEndpoint()
    {
        $this->response  = $this->client->request('GET', 'random', $this->headers);
    }

    /**
     * @Then I should get a gif with a title and url
     */
    public function iShouldGetAGifWithATitleAndUrl()
    {
        $data = json_decode($this->response->getBody())->data;
        $firstGif = current($data);
        PHPUnit::assertObjectHasAttribute('title', $firstGif);
        PHPUnit::assertObjectHasAttribute('url', $firstGif);
    }

    /**
     * @When I search with no term
     */
    public function iSearchWithNoTerm()
    {
        $this->response  = $this->client->request('GET', 'search', $this->headers);
    }

    /**
     * @Then I should get multiple gifs
     */
    public function iShouldGetMultipleGifs()
    {
        $data = json_decode($this->response->getBody(), false)->data;
        PHPUnit::assertTrue(count($data) > 1);
    }
}
