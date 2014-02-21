<?php
namespace REK\RotesBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use REK\RotesBundle\Entity\Rote;

class LoadRotesData extends AbstractFixture implements OrderedFixtureInterface
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
        $rote = new Rote();
        $rote->setMessage('This is the default message.');

        $manager->persist($rote);
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