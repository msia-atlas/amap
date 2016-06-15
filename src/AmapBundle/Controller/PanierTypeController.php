<?php

namespace AmapBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AmapBundle\Entity\PanierType;
use AmapBundle\Form\PanierTypeType;

/**
 * PanierType controller.
 *
 */
class PanierTypeController extends Controller
{

    /**
     * Lists all PanierType entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AmapBundle:PanierType')->findAll();

        return $this->render('AmapBundle:PanierType:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new PanierType entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new PanierType();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('panierType_show', array('id' => $entity->getId())));
        }

        return $this->render('AmapBundle:PanierType:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a PanierType entity.
     *
     * @param PanierType $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(PanierType $entity)
    {
        $form = $this->createForm(new PanierTypeType(), $entity, array(
            'action' => $this->generateUrl('panierType_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Ajouter','attr'=>['class'=>'"btn btn-success pull-right"']));

        return $form;
    }
    /**
     * Creates a form to create a PanierType entity.
     *
     * @param PanierType $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function creatLignePanierForm(LignePanier $entity)
    {
        $form = $this->createForm(new LignePanierType(), $entity, array(
            'action' => $this->generateUrl('panierType_create'),
            'method' => 'POST',
        ));
        return $form;
    }
    /**
     * Displays a form to create a new PanierType entity.
     *
     */
    public function newAction()
    {
        $entity = new PanierType();
        $form   = $this->createCreateForm($entity);
       
        return $this->render('AmapBundle:PanierType:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a PanierType entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmapBundle:PanierType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PanierType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmapBundle:PanierType:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing PanierType entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmapBundle:PanierType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PanierType entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmapBundle:PanierType:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a PanierType entity.
    *
    * @param PanierType $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(PanierType $entity)
    {
        $form = $this->createForm(new PanierTypeType(), $entity, array(
            'action' => $this->generateUrl('panierType_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing PanierType entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmapBundle:PanierType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PanierType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('panierType_edit', array('id' => $id)));
        }

        return $this->render('AmapBundle:PanierType:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a PanierType entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AmapBundle:PanierType')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find PanierType entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('panierType'));
    }

    /**
     * Creates a form to delete a PanierType entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('panierType_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
