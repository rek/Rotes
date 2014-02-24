<?php

namespace REK\RotesBundle\Tests\Controller;

// use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Liip\FunctionalTestBundle\Test\WebTestCase;

require_once(__DIR__ . "/../../../../../app/AppKernel.php");

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Tester\ApplicationTester;
use Symfony\Component\Console\Output\Output;

use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

use REK\RotesBundle\Entity\Rote;

class RoteControllerTest extends WebTestCase
{

    private $client = null;

    public function setUp()
    {
        $classes = array(
            'REK\RotesBundle\DataFixtures\ORM\LoadUsers',
        );

        $this->loadFixtures($classes);
    }

    // Assert a specific 200 status code
    // $this->assertEquals(
        // Response::HTTP_OK,
        // $client->getResponse()->getStatusCode()
    // );

// protected static $kernel;
// protected static $container;

// public static function setUpBeforeClass()
// {
    // self::$kernel = new \AppKernel('test', true);
    // self::$kernel->boot();
//
    // self::$container = self::$kernel->getContainer();
// }

    public function testHomepage()
    {
        // self::setUpBeforeClass();
        $this->client = static::createClient();
        $crawler = $this->client->request('GET', '/');

        // or simply check that the response is a redirect to any URL
        // $this->assertTrue($this->client->getResponse()->isRedirect());

        echo $this->client->getResponse()->getContent();die;

        $this->assertCount(1, $crawler->filter('html:contains("This is the default message.")'));
    }

    public function testRoteContentAnnon()
    {
        // $client = static::createClient();
        $crawler = $this->client->request('GET', '/rote/Todo');
        echo $this->client->getResponse()->getContent();die;
        $this->assertCount(1, $crawler->filter('html:contains("You should do some things.")'));
    }

    public function testRoteContentAdmin()
    {
        $crawler = $this->client->request('GET', '/rote/Todo');
        $this->assertCount(1, $crawler->filter('html:contains("You should do some things.")'));
        $this->assertGreaterThan(0, $crawler->filter('html:contains("Save")')->count());
    }

    public function testRoteCreateAnnon()
    {
        $crawler = $this->client->request('GET', '/rote_create');
        $this->assertCount(1, $crawler->filter('html:contains("Login")'));
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

        // $cookie = new Cookie($session->getName(), $session->getId());
        // $this->client->getCookieJar()->set($cookie);

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
