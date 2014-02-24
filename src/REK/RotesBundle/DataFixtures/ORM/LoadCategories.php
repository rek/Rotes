<?php
namespace REK\RotesBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use REK\RotesBundle\Entity\Category;

class LoadCategories extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $cats = array(
            "Symfony2 Notes" => array(
                // 'secure' => 0,
                'position' => 50
            ),
            "TODO" => array(
                'position' => 50
            ),
        );

        foreach($cats as $name => $catData) {
            $cat = new Category();
            $cat->setName($name);
            $cat->setPosition($catData['position']);

            // $manager->persist($cat);
        }

        // $manager->flush();

        // $this->addReference('pages', $pages);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 25; // the order in which fixtures will be loaded
    }
}