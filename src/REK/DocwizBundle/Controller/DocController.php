<?php

namespace REK\DocwizBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use REK\DocwizBundle\Entity\Doc;

class DocController extends Controller
{

    /**
     * @Route("/doc/create", name="doc_create")
     * @Template()
     */
    public function createDocAction() {
        $formData = new Doc();

        $flow = $this->get('rek.docwiz.form.flow.createDoc');
        $flow->bind($formData);

        // form of the current step
        $form = $flow->createForm();
        if ($flow->isValid($form)) {
            $flow->saveCurrentStepData($form);

            if ($flow->nextStep()) {
                // form for the next step
                $form = $flow->createForm();
            } else {
                // flow finished
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($formData);
                $em->flush();

                $flow->reset(); // remove step data from the session

                return $this->redirect($this->generateUrl('home')); // redirect when done
            }
        }

        return array(
            'form' => $form->createView(),
            'flow' => $flow,
        );
    }
}
