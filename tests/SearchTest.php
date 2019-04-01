<?php

use App\Search;

class SearchTest extends TestCase
{

    public function testWildcardSearch()
    {
        $search = new Search();
        $results = $search->all();
        $this->assertTrue(count($results['data']) > 0);
    }

    public function testSearchTerm()
    {
        $search = new Search();
        $results = $search->search('typing');
        $topResult = array_pop($results['data']);
        $this->assertSame('Typing', $topResult['title']);
    }

    public function testRandom()
    {
        $search = new Search();
        $results = $search->random();
        $this->assertTrue(count($results['data']) === 1);
    }
}