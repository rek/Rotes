<?php

namespace REK\RotesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use REK\RotesBundle\Entity\Rote;

class RoteController extends Controller
{

    /**
     * @Route("/", name="home")
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
     * @Route("{id}", name="rote_show", requirements={"id" = "\d+"})
     * @Template()
     */
    public function indexAction(Rote $rote, Request $request)
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

        // does validation if posted:
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($rote);
            $em->flush();
        }

        return array(
            'form' => $form->createView()
        );
    }

    /**
     * @Route("/rote_create", name="rote_create")
     * @Method({"GET", "POST"})
     * @Template("REKRotesBundle:Rote:index.html.twig")
     */
    public function createAction(Request $request)
    {
        $rote = new Rote();

        // use the rote service:
        $form = $this->createForm('rote', $rote);

        // bind the send data to the new rote entity
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($form);
            $em->flush();
        }

        return array(
            'form' => $form->createView()
        );

    }
}
