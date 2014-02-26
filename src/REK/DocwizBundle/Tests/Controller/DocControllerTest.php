<?php

namespace REK\DocwizBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DocControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $this->assertTrue(true);
    }
}
