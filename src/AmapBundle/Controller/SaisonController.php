<?php

namespace AmapBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AmapBundle\Entity\Saison;
use AmapBundle\Form\SaisonType;

/**
 * Saison controller.
 *
 */
class SaisonController extends Controller
{

    /**
     * Lists all Saison entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AmapBundle:Saison')->findAll();

        return $this->render('AmapBundle:Saison:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Saison entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Saison();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('saison_show', array('id' => $entity->getId())));
        }

        return $this->render('AmapBundle:Saison:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Saison entity.
     *
     * @param Saison $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Saison $entity)
    {
        $form = $this->createForm(new SaisonType(), $entity, array(
            'action' => $this->generateUrl('saison_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Saison entity.
     *
     */
    public function newAction()
    {
        $entity = new Saison();
        $form   = $this->createCreateForm($entity);

        return $this->render('AmapBundle:Saison:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Saison entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmapBundle:Saison')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Saison entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmapBundle:Saison:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Saison entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmapBundle:Saison')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Saison entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmapBundle:Saison:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Saison entity.
    *
    * @param Saison $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Saison $entity)
    {
        $form = $this->createForm(new SaisonType(), $entity, array(
            'action' => $this->generateUrl('saison_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Saison entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmapBundle:Saison')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Saison entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('saison_edit', array('id' => $id)));
        }

        return $this->render('AmapBundle:Saison:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Saison entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AmapBundle:Saison')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Saison entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('saison'));
    }

    /**
     * Creates a form to delete a Saison entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('saison_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
