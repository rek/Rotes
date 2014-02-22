<?php

namespace REK\RotesBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttributes(array('class' => 'nav navbar-nav'));

        $em = $this->container->get('doctrine.orm.entity_manager');
        $pages = $em->getRepository('REK\RotesBundle\Entity\Page')
            ->createQueryBuilder('p')
            // ->useResultCache(true, 360)
            ->where('p.parentId = 0')
            ->orderBy('p.position', 'ASC')
            ->getQuery()
            ->getResult()
        ;


        foreach ($pages as $page) {
            if (
                    // show all pages if we are authed and page is not set to hidden (login page is set to hidden to authed users)
                    ($options['authenticated'] && false !== $page->getIsSecured())
                ||
                    // if we are un authed, do not show secure stuff.
                    (!$options['authenticated'] && true !== $page->getIsSecured())
            ) {
                // $route = $this->container->get('router')->match('/'.$page->getRoute());
                $menu->addChild($page->getName(), array('route' => $page->getRoute()));
            }
        }

        // $menu->addChild('About Me', array(
            // 'route' => 'page_show',
            // 'routeParameters' => array('id' => 42)
        // ));

        return $menu;
    }

    public function subMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttributes(array('class' => 'nav navbar-nav'));
        $em = $this->container->get('doctrine.orm.entity_manager');
        $pages = $em->getRepository('REK\RotesBundle\Entity\Page')
            ->createQueryBuilder('p')
            // ->useResultCache(true, 360)
            ->where('p.parentId != 0')
            ->orderBy('p.position', 'ASC')
            ->getQuery()
            ->getResult()
        ;

        foreach ($pages as $page) {
            if (
                    // show all pages if we are authed and page is not set to hidden (login page is set to hidden to authed users)
                    ($options['authenticated'] && false !== $page->getIsSecured())
                ||
                    // if we are un authed, do not show secure stuff.
                    (!$options['authenticated'] && true !== $page->getIsSecured())
            ) {
                // $route = $this->container->get('router')->match('/'.$page->getRoute());
                $menu->addChild($page->getName(), array('route' => '/rote/'.$page->getRoute()));
            }
        }

        // $menu->addChild('About Me', array(
            // 'route' => 'page_show',
            // 'routeParameters' => array('id' => 42)
        // ));

        return $menu;
    }
}