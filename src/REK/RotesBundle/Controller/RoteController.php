<?php

namespace REK\RotesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class RoteController extends Controller
{
    /**
     * @Route("/r/{id}")
     * @ParamConverter("id", class="REK\RotesBundle\Entity\Rote")
     * @Template()
     */
    public function indexAction(Rote $rote) //Rote $rote
    {

        // $rote = $this->getDoctrine()
        // ->getRepository('REK\RotesBundle\Entity\Rote')
        // ->find($id);

        if (!$rote) {
          throw $this->createNotFoundException(
              'No rote found for id '.$id
          );
        }

        return array('rote' => $rote);
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
