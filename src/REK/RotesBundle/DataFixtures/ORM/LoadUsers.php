<?php
namespace REK\RotesBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUsers extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    // NOTE: to get refs
    // $this->getReference('rote-1')

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $users = array(
            "test" => array(
                'email'    => 'test@test.com',
                'password' => 'test'
            ),
        );

        $userManager = $this->container->get('fos_user.user_manager');

        foreach($users as $name => $info) {

            // $user = new User();
            // $user->setName($info['password']);
            $user = $userManager->createUser();
            $user->setUsername($name);
            $user->setEmail($info['email']);
            $user->setPlainPassword($info['password']);
            $user->setEnabled(true);
            $userManager->updateUser($user);

            // $manager->persist($user);
        }

        // $manager->flush();

        // $this->addReference('pages', $pages);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 10; // the order in which fixtures will be loaded
    }
}