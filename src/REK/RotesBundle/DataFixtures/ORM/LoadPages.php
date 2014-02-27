<?php
namespace REK\RotesBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use REK\RotesBundle\Entity\Page;

class LoadPages extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $pages = array(
            "fos_user_security_login" => array(
                'name' => 'Login',
                'secure' => false // show only when logged out
            ),
            "fos_user_registration_register" => array(
                'name' => 'Register',
                'secure' => false
            ),
            // "fos_user_profile_show" => array(
                // 'name' => 'Profile',
                // 'secure' => true // show only when logged in
            // ),
            "doc_create" => array(
                'name' => 'Create Doc',
                'secure' => true
            ),
            "rote_create" => array(
                'name' => 'Create Rote',
                'secure' => true
            ),
            "settings" => array(
                'name' => 'Settings',
                'secure' => true
            ),
            "fos_user_security_logout" => array(
                'name' => 'Logout',
                'secure' => true
            )
        );

        foreach($pages as $route => $pageData) {
            $page = new Page();
            $page->setName($pageData['name']);
            $page->setRoute($route);
            $page->setParentId(0);
            $page->setShowpage(true);
            // leave it null if not set.
            // null means always show.
            if (isset($pageData['secure'])) {
                $page->setSecure($pageData['secure']);
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
        return 20; // the order in which fixtures will be loaded
    }
}