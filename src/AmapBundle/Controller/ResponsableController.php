<?php

namespace AmapBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AmapBundle\Entity\Responsable;

/**
 * Responsable controller.
 *
 */
class ResponsableController extends Controller
{

    /**
     * Lists all Responsable entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AmapBundle:Responsable')->findAll();

        return $this->render('AmapBundle:Responsable:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Responsable entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmapBundle:Responsable')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Responsable entity.');
        }

        return $this->render('AmapBundle:Responsable:show.html.twig', array(
            'entity'      => $entity,
        ));
    }
}
