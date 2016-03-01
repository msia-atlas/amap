<?php

namespace AmapBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AmapBundle\Entity\TypePanier;
use AmapBundle\Form\TypePanierType;

/**
 * TypePanier controller.
 *
 */
class TypePanierController extends Controller
{

    /**
     * Lists all TypePanier entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AmapBundle:TypePanier')->findAll();

        return $this->render('AmapBundle:TypePanier:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new TypePanier entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new TypePanier();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('typepanier_show', array('id' => $entity->getId())));
        }

        return $this->render('AmapBundle:TypePanier:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a TypePanier entity.
     *
     * @param TypePanier $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TypePanier $entity)
    {
        $form = $this->createForm(new TypePanierType(), $entity, array(
            'action' => $this->generateUrl('typepanier_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TypePanier entity.
     *
     */
    public function newAction()
    {
        $entity = new TypePanier();
        $form   = $this->createCreateForm($entity);

        return $this->render('AmapBundle:TypePanier:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TypePanier entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmapBundle:TypePanier')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TypePanier entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmapBundle:TypePanier:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TypePanier entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmapBundle:TypePanier')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TypePanier entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmapBundle:TypePanier:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a TypePanier entity.
    *
    * @param TypePanier $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TypePanier $entity)
    {
        $form = $this->createForm(new TypePanierType(), $entity, array(
            'action' => $this->generateUrl('typepanier_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TypePanier entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmapBundle:TypePanier')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TypePanier entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('typepanier_edit', array('id' => $id)));
        }

        return $this->render('AmapBundle:TypePanier:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a TypePanier entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AmapBundle:TypePanier')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TypePanier entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('typepanier'));
    }

    /**
     * Creates a form to delete a TypePanier entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('typepanier_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
