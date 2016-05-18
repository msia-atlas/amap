<?php

namespace AmapBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AmapBundle\Entity\Amap;

/**
 * Amap controller.
 *
 */
class AmapController extends Controller
{

    /**
     * Lists all Amap entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AmapBundle:Amap')->findAll();

        return $this->render('AmapBundle:Amap:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Amap entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmapBundle:Amap')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Amap entity.');
        }

        return $this->render('AmapBundle:Amap:show.html.twig', array(
            'entity'      => $entity,
        ));
    }
}
