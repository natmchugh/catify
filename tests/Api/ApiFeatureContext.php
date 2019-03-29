<?php
namespace App\Tests\Api;

use Behat\Gherkin\Node\PyStringNode;
use Behat\Behat\Tester\Exception\PendingException;
use App\Tests\LumenFeatureContext;
use PHPUnit\Framework\Assert as PHPUnit;
use App\Search as GifSearch;

class ApiFeatureContext extends LumenFeatureContext
{
    protected $gifSearch;

    /**
     * @Given I want to search gifs
     */
    public function iWantToSearchGifs()
    {
        $this->gifSearch = new GifSearch;
    }

    /**
     * @Given I have a valid API Token
     */
    public function iHaveAValidApiToken()
    {
        $this->gifSearch->setToken('VALIDTOKEN');
    }

    /**
     * @When I search :term
     */
    public function iSearch($term)
    {
        $this->buildResponse = $this->gifSearch->search($term);
    }

    /**
     * @Then I should get:
     */
    public function iShouldGet(PyStringNode $string)
    {
        $expected = json_decode($string, true);
        PHPUnit::assertEquals($expected, $this->buildResponse);
    }
}
