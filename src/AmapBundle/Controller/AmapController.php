<?php

namespace AmapBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AmapBundle\Entity\Amap;
use AmapBundle\Form\AmapType;

/**
 * Amap controller.
 *
 */
class AmapController extends Controller {

    /**
     * Lists all Amap entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AmapBundle:Amap')->findAll();
        foreach ($entities as $entity) {
            $responsable = $this->getResponsable($entity, $em);
            $responsables[$entity->getId()] = $responsable;
        }
        return $this->render('AmapBundle:Amap:index.html.twig', array(
                    'entities' => $entities,
                    'responsables' => $responsables
        ));
    }

    /**
     * Creates a new Amap entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new Amap();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('amap_show', array('id' => $entity->getId())));
        }

        return $this->render('AmapBundle:Amap:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Amap entity.
     *
     * @param Amap $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Amap $entity) {
        $form = $this->createForm(new AmapType(), $entity, array(
            'action' => $this->generateUrl('amap_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Amap entity.
     *
     */
    public function newAction() {
        $entity = new Amap();
        $form = $this->createCreateForm($entity);

        return $this->render('AmapBundle:Amap:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Amap entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmapBundle:Amap')->find($id);
        $responsable = $this->getResponsable($entity, $em);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Amap entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmapBundle:Amap:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),
                    'responsable' => $responsable
        ));
    }

    /**
     * Displays a form to edit an existing Amap entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmapBundle:Amap')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Amap entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmapBundle:Amap:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Amap entity.
     *
     * @param Amap $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Amap $entity) {
        $form = $this->createForm(new AmapType(), $entity, array(
            'action' => $this->generateUrl('amap_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Amap entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmapBundle:Amap')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Amap entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('amap_edit', array('id' => $id)));
        }

        return $this->render('AmapBundle:Amap:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Amap entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AmapBundle:Amap')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Amap entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('amap'));
    }

    /**
     * Creates a form to delete a Amap entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('amap_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }

    private function getResponsable(Amap $amap, $em) {
        return $em->getRepository('AmapBundle:Personne')->findOneBy(array('amap' => $amap));
    }

}
