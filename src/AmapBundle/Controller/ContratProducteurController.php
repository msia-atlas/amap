<?php

namespace AmapBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AmapBundle\Entity\ContratProducteur;
use AmapBundle\Form\ContratProducteurType;

/**
 * ContratProducteur controller.
 *
 */
class ContratProducteurController extends Controller
{

    /**
     * Lists all ContratProducteur entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AmapBundle:ContratProducteur')->findAll();

        return $this->render('AmapBundle:ContratProducteur:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new ContratProducteur entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new ContratProducteur();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('contratProducteur_show', array('id' => $entity->getId())));
        }

        return $this->render('AmapBundle:ContratProducteur:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a ContratProducteur entity.
     *
     * @param ContratProducteur $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ContratProducteur $entity)
    {
        $form = $this->createForm(new ContratProducteurType(), $entity, array(
            'action' => $this->generateUrl('contratProducteur_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ContratProducteur entity.
     *
     */
    public function newAction()
    {
        $entity = new ContratProducteur();
        $form   = $this->createCreateForm($entity);

        return $this->render('AmapBundle:ContratProducteur:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ContratProducteur entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmapBundle:ContratProducteur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ContratProducteur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmapBundle:ContratProducteur:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ContratProducteur entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmapBundle:ContratProducteur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ContratProducteur entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmapBundle:ContratProducteur:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a ContratProducteur entity.
    *
    * @param ContratProducteur $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ContratProducteur $entity)
    {
        $form = $this->createForm(new ContratProducteurType(), $entity, array(
            'action' => $this->generateUrl('contratProducteur_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ContratProducteur entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmapBundle:ContratProducteur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ContratProducteur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('contratProducteur_edit', array('id' => $id)));
        }

        return $this->render('AmapBundle:ContratProducteur:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a ContratProducteur entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AmapBundle:ContratProducteur')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ContratProducteur entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('contratProducteur'));
    }

    /**
     * Creates a form to delete a ContratProducteur entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('contratProducteur_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
