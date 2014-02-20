<?php
namespace REK\RotesBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use REK\RotesBundle\Entity\Page;

class LoadPages extends AbstractFixture implements OrderedFixtureInterface
{
    // NOTE: if we want a container:
    // use Symfony\Component\DependencyInjection\ContainerAwareInterface;
    // use Symfony\Component\DependencyInjection\ContainerInterface;
    // implements ContainerAwareInterface
    /**
     * {@inheritDoc}
     */
    // public function setContainer(ContainerInterface $container = null)
    // {
        // $this->container = $container;
    // }

    // NOTE: to get refs
    // $this->getReference('rote-1')

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $pages = array(
            "home" => array(
                'name' => 'Home'
            ),
            "doc_create" => array(
                'name' => 'Create Form'
            ),
            "fos_user_security_login" => array(
                'name' => 'Login',
                'isSecured' => false
            ),
            "fos_user_registration_register" => array(
                'name' => 'Register',
                'isSecured' => false
            ),
            "fos_user_profile_show" => array(
                'name' => 'Profile',
                'isSecured' => true
            ),
            "fos_user_security_logout" => array(
                'name' => 'Logout',
                'isSecured' => true
            )
        );

        foreach($pages as $route => $pageData) {
            $page = new Page();
            $page->setName($pageData['name']);
            $page->setRoute($route);
            // leave it null if not set.
            // null means always show.
            if (isset($pageData['isSecured'])) {
                $page->setIsSecured($pageData['isSecured']);
            }

            $manager->persist($page);
        }

        $manager->flush();

        // $this->addReference('pages', $pages);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}