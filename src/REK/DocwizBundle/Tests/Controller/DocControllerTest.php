<?php

namespace REK\DocwizBundle\Tests\Controller;

use Liip\FunctionalTestBundle\Test\WebTestCase;

use Symfony\Component\HttpFoundation\Response;
// use Symfony\Bundle\FrameworkBundle\Console\Application;
// use Symfony\Component\Console\Tester\ApplicationTester;
// use Symfony\Component\Console\Output\Output;

use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class DocControllerTest extends WebTestCase
{

    private $client = null;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    public function setUp()
    {
        $classes = array(
            'REK\RotesBundle\DataFixtures\ORM\LoadUsers',
            'REK\RotesBundle\DataFixtures\ORM\LoadRotes',
            'REK\RotesBundle\DataFixtures\ORM\LoadPages'
        );

        $this->loadFixtures($classes);
        $this->client = static::createClient();
    }

    public function testCreatePage()
    {
        $crawler = $this->client->request('GET', '/doc_create');

        // Assert a specific 200 status code
        $this->assertEquals(
            Response::HTTP_OK,
            $this->client->getResponse()->getStatusCode()
        );

        // echo $this->client->getResponse()->getContent(); die();

        $this->assertCount(1, $crawler->filter('html:contains("This is the default message.")'));
    }
}