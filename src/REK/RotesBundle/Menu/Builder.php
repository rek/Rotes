<?php

namespace REK\RotesBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{

    public function pagesMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttributes(array('class' => 'nav navbar-nav navbar-right'));

        $em = $this->container->get('doctrine.orm.entity_manager');
        $pages = $em->getRepository('REK\RotesBundle\Entity\Page')
            ->createQueryBuilder('p')
            // ->useResultCache(true, 360)
            ->orderBy('p.position', 'ASC')
            ->getQuery()
            ->getResult()
        ;

        $securityContext = $this->container->get('security.context');

        foreach ($pages as $page) {
            if ($this->okToShow($page, $securityContext)) {
                // $route = $this->container->get('router')->match('/'.$page->getRoute());
                $menu->addChild($page->getName(), array('route' => $page->getRoute()));
            }
        }

        return $menu;
    }

    public function roteMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttributes(array('class' => 'nav navbar-nav'));
        $em = $this->container->get('doctrine.orm.entity_manager');
        $rotes = $em->getRepository('REK\RotesBundle\Entity\Rote')
            ->createQueryBuilder('c')
            // ->useResultCache(true, 360)
            // ->where('c.parentId != 0')
            ->orderBy('c.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;

        $securityContext = $this->container->get('security.context');

        foreach ($rotes as $r) {
            if ($this->okToShow($r, $securityContext)) {
                $menu->addChild($r->getName(), array(
                    'route' => 'rote_show',
                    'routeParameters' => array('slug' => $r->getSlug())
                ));
            }
        }

        // $menu->addChild('About Me', array(
            // 'route' => 'page_show',
            // 'routeParameters' => array('id' => 42)
        // ));

        return $menu;
    }

    /**
    * Check if we can show this page to the user
    *
    */
    private function okToShow($page, $securityContext) {
        return (
                // show all pages if we are authed and page is not set to hidden (login page is set to hidden to authed users)
                ($securityContext->isGranted('ROLE_USER') && false !== $page->getSecure())
            ||
                // if we are un authed, do not show secure stuff.
                (!$securityContext->isGranted('ROLE_USER') && true !== $page->getSecure())
        ) ? true : false;
    }
}