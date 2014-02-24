<?php

namespace REK\RotesBundle\Tests\Controller;

// use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Liip\FunctionalTestBundle\Test\WebTestCase;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Tester\ApplicationTester;
use Symfony\Component\Console\Output\Output;

use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class RoteControllerTest extends WebTestCase
{

    private $client = null;

    public function setUp()
    {
        $classes = array(
            'REK\RotesBundle\DataFixtures\ORM\LoadUsers',
        );
        $this->loadFixtures($classes);
        $client = static::createClient();
    }

    public function testHomepage()
    {

        $crawler = $client->request('GET', '/');
        $this->assertTrue($crawler->filter('html:contains("This is the default message.")')->count() > 0);

    }

    public function testRoteContentAnnon()
    {
        // $client = static::createClient();
        $crawler = $client->request('GET', '/1');
        $this->assertTrue($crawler->filter('html:contains("This is the default message.")')->count() > 0);
    }

    public function testRoteContentAdmin()
    {
    }

    public function testRoteCreateAnnon()
    {
        $crawler = $client->request('GET', '/rote_create');
        $this->assertTrue($crawler->filter('html:contains("Login")')->count() > 0);
    }

    public function testRoteCreateAdmin()
    {
        $this->logIn();

        $crawler = $this->client->request('GET', '/rote_create');
        $this->assertTrue($this->client->getResponse()->isSuccessful());
        $this->assertGreaterThan(0, $crawler->filter('html:contains("Save")')->count());
    }

    private function login() {
        $session = $this->client->getContainer()->get('session');

        $firewall = 'main';
        $token = new UsernamePasswordToken('test', null, $firewall, array('ROLE_USER'));
        $session->set('_security_'.$firewall, serialize($token));
        $session->save();

        $cookie = new Cookie($session->getName(), $session->getId());
        $this->client->getCookieJar()->set($cookie);

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
