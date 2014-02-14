<?php

namespace REK\RotesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        return array('form' => '');
        // return array('form' => $form);
    }

    /**
     * @Route("/edit/{id}")
     * /@Method({"GET", "POST"})
     * @Template()
     */
    public function editAction($id, $method)
    {
        return array('form' => $form);
    }
}
