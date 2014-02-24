<?php

namespace REK\RotesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use REK\RotesBundle\Entity\Rote;
use REK\RotesBundle\Entity\Category;

class RoteController extends Controller
{

    /**
     * @Route("/", name="home")
     * @Template()
     */
    public function homeAction()
    {
        $rote = $this->getDoctrine()
        ->getRepository('REK\RotesBundle\Entity\Rote')
        ->findOneBy(array(),array(
            'updated' => 'asc'
        ));

        return array('rote' => $rote);
    }

    /**
     * @Route("/rote/{slug}", name="rote_show")
     * #, @ParamConverter("category", class="REKRotesBundle:Category", options={"slug" = "slug"})
     * #, requirements={"id" = "\d+"}
     * @Template
     */
    public function editAction(Category $category, Request $request)
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

        // get first rote only
        $rote = $category->getRotes()[0];

        // give normal users a different form.
        if (false === $this->get('security.context')->isGranted('ROLE_USER')) {
            return $this->render(
                'REKRotesBundle:Rote:show.html.twig',
                array(
                    'rote' => $rote
                )
            );
        }


        if (!$rote) {
            $rote = new Rote();
            $rote->setCategory($category);
        }

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
     * @Security("has_role('ROLE_USER')")
     * @Template("REKRotesBundle:Rote:edit.html.twig")
     */
    public function createAction(Request $request)
    {
        $rote = new Rote();

        // use the rote service:
        $form = $this->createForm('rote', $rote);

        $em = $this->getDoctrine()->getManager();

        // convert the text into an object
        if ($request->isMethod('POST')) {
            $cat = new Category();
            $cat->setName($request->request->get('rote')['category']);
            $request->request->get('rote')['category'] = $cat->getId();
            $em->persist($cat);
            $em->flush();
        }

        // bind the send data to the new rote entity
        $form->handleRequest($request);

        if ($form->isValid()) {

            // note cascade="persist" can be added to rotes too
            // instead of this... but it wasnt working for me

            // $page = $form->getData()->getPage();
            // $em->persist($page);

            // set a manual position for now
            $form->getData()['position'] = 50;

            // and the main form
            $em->persist($form->getData());
            $em->flush();

        }

        return array(
            'form' => $form->createView()
        );

    }
}
