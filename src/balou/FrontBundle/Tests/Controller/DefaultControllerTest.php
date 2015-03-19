<?php

namespace balou\FrontBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/hello');

        $this->assertTrue($crawler->filter('html:contains("Hello")')->count() > 0);
    }
}
