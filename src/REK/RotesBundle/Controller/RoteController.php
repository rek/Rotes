<?php

namespace REK\RotesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use REK\RotesBundle\Entity\Rote;

class RoteController extends Controller
{

    /**
     * @Route("{id}", name="rote_show")
     * @Template()
     */
    public function indexAction(Rote $rote)
    {
        // $rote = $this->getDoctrine()
        // ->getRepository('REK\RotesBundle\Entity\Rote')
        // ->find($id);

        // if (!$rote) {
        //   throw $this->createNotFoundException(
        //       'No rote found for id '.$id
        //   );
        // }

        // manually call form,
        // remember to add:
        // use REK\RotesBundle\Form\Type\RoteType;
        // $form = $this->createForm(new RoteType(), $rote);

        // use the rote service:
        $form = $this->createForm('rote', $rote);

        return array(
            'rote' => $rote,
            'form' => $form->createView()
        );
    }

    /**
     * @Route("/")
     * @Template()
     */
    public function homeAction()
    {
        $rotes = $this->getDoctrine()
        ->getRepository('REK\RotesBundle\Entity\Rote')
        ->findAll();

        return array('rotes' => $rotes);
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