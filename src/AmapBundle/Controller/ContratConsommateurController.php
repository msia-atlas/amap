<?php

namespace AmapBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AmapBundle\Entity\ContratConsommateur;
use AmapBundle\Form\ContratConsommateurType;

/**
 * ContratConsommateur controller.
 *
 */
class ContratConsommateurController extends Controller
{

    /**
     * Lists all ContratConsommateur entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AmapBundle:ContratConsommateur')->findAll();

        return $this->render('AmapBundle:ContratConsommateur:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new ContratConsommateur entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new ContratConsommateur();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('contratconsommateur_show', array('id' => $entity->getId())));
        }

        return $this->render('AmapBundle:ContratConsommateur:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a ContratConsommateur entity.
     *
     * @param ContratConsommateur $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ContratConsommateur $entity)
    {
        $form = $this->createForm(new ContratConsommateurType(), $entity, array(
            'action' => $this->generateUrl('contratconsommateur_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ContratConsommateur entity.
     *
     */
    public function newAction()
    {
        $entity = new ContratConsommateur();
        $form   = $this->createCreateForm($entity);

        return $this->render('AmapBundle:ContratConsommateur:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ContratConsommateur entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmapBundle:ContratConsommateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ContratConsommateur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmapBundle:ContratConsommateur:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ContratConsommateur entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmapBundle:ContratConsommateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ContratConsommateur entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmapBundle:ContratConsommateur:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a ContratConsommateur entity.
    *
    * @param ContratConsommateur $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ContratConsommateur $entity)
    {
        $form = $this->createForm(new ContratConsommateurType(), $entity, array(
            'action' => $this->generateUrl('contratconsommateur_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ContratConsommateur entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmapBundle:ContratConsommateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ContratConsommateur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('contratconsommateur_edit', array('id' => $id)));
        }

        return $this->render('AmapBundle:ContratConsommateur:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a ContratConsommateur entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AmapBundle:ContratConsommateur')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ContratConsommateur entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('contratconsommateur'));
    }

    /**
     * Creates a form to delete a ContratConsommateur entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('contratconsommateur_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
