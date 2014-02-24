<?php

namespace REK\RotesBundle\Tests\Controller;

// use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Liip\FunctionalTestBundle\Test\WebTestCase;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Tester\ApplicationTester;
use Symfony\Component\Console\Output\Output;

class RoteControllerTest extends WebTestCase
{

    public function setUp()
    {
        $classes = array(
            'REK\RotesBundle\DataFixtures\ORM\LoadUsers',
        );
        $this->loadFixtures($classes);
    }

    public function testHomepage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');
        $this->assertTrue($crawler->filter('html:contains("This is the default message.")')->count() > 0);

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
