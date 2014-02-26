<?php
namespace REK\RotesBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use REK\RotesBundle\Entity\Rote;

class LoadRotes extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $rotes = array(
            "Symfony2 Notes" => array(
                // 'secure' => 0,
                'message' => 'This is the default message.',
                'position' => 50
            ),
            "TODO" => array(
                'message' => 'You should do some things.',
                'position' => 50
            ),
        );

        foreach($rotes as $name => $roteData) {
            $rote = new Rote();
            $rote->setName($name);
            // $rote->setPosition($roteData['position']);
            $rote->setMessage($roteData['message']);

            $manager->persist($rote);
        }

        $manager->flush();

        $this->addReference('rote-1', $rote);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 30; // the order in which fixtures will be loaded
    }
}