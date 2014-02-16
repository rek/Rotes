<?php

namespace REK\RotesBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RoteControllerTest extends WebTestCase
{

    public function testHomepage()
    {

    }

    public function testDefaultContentIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/1');
        $this->assertTrue($crawler->filter('html:contains("This is the default message.")')->count() > 0);
    }


// $link = $crawler->filter('a:contains("Greet")')->eq(1)->link();

// $crawler = $client->click($link);

// $form = $crawler->selectButton('submit')->form();
// set some values
// $form['name'] = 'Lucas';
// $form['form_name[subject]'] = 'Hey there!';
// submit the form
// $crawler = $client->submit($form);

// Assert that the response matches a given CSS selector.
// $this->assertGreaterThan(0, $crawler->filter('h1')->count());    }

// $this->assertRegExp(
    // '/Hello Fabien/',
    // $client->getResponse()->getContent()
// );
}
