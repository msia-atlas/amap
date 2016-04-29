<?php

namespace AmapBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AmapBundle\Entity\Magasin;
use AmapBundle\Form\MagasinType;

/**
 * Magasin controller.
 *
 */
class MagasinController extends Controller
{

    /**
     * Lists all Magasin entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AmapBundle:Magasin')->findAll();

        return $this->render('AmapBundle:Magasin:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Magasin entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Magasin();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('magasin_show', array('id' => $entity->getId())));
        }

        return $this->render('AmapBundle:Magasin:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Magasin entity.
     *
     * @param Magasin $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Magasin $entity)
    {
        $form = $this->createForm(new MagasinType(), $entity, array(
            'action' => $this->generateUrl('magasin_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Magasin entity.
     *
     */
    public function newAction()
    {
        $entity = new Magasin();
        $form   = $this->createCreateForm($entity);

        return $this->render('AmapBundle:Magasin:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Magasin entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmapBundle:Magasin')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Magasin entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmapBundle:Magasin:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Magasin entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmapBundle:Magasin')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Magasin entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmapBundle:Magasin:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Magasin entity.
    *
    * @param Magasin $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Magasin $entity)
    {
        $form = $this->createForm(new MagasinType(), $entity, array(
            'action' => $this->generateUrl('magasin_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Magasin entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmapBundle:Magasin')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Magasin entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('magasin_edit', array('id' => $id)));
        }

        return $this->render('AmapBundle:Magasin:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Magasin entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AmapBundle:Magasin')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Magasin entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('magasin'));
    }

    /**
     * Creates a form to delete a Magasin entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('magasin_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
