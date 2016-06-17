<?php

namespace AmapBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AmapBundle\Entity\ContratConsommateur;
use AmapBundle\Form\ContratConsommateurType;
use AmapBundle\Util\UserUtil;
use AmapBundle\Entity\Personne;
use AmapBundle\Entity\Contrat;
use AmapBundle\Entity\Panier;

/**
 * ContratConsommateur controller.
 *
 */
class ContratConsommateurController extends Controller {

    /**
     * Lists all ContratConsommateur entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $user = UserUtil::getCourrentUser($this, Personne::$TYPE_CONSOMMATEUR);
        $entities = $em->getRepository('AmapBundle:ContratConsommateur')->findBy(array('consommateur' => $user));

        return $this->render('AmapBundle:ContratConsommateur:index.html.twig', array(
                    'entities' => $entities,
        ));
    }

    /**
     * Creates a new ContratConsommateur entity.
     *
     */
    public function createAction(Request $request) {
        $user = UserUtil::getCourrentUser($this, Personne::$TYPE_CONSOMMATEUR);
        $entity = new ContratConsommateur();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $entity->setConsommateur($user);
        $entity->setStatut(Contrat::STATUT_CREATE);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('contratConsommateur_show', array('id' => $entity->getId())));
        }

        return $this->render('AmapBundle:ContratConsommateur:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a ContratConsommateur entity.
     *
     * @param ContratConsommateur $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ContratConsommateur $entity) {
        $form = $this->createForm(new ContratConsommateurType(), $entity, array(
            'action' => $this->generateUrl('contratConsommateur_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ContratConsommateur entity.
     *
     */
    public function newAction() {
        $entity = new ContratConsommateur();
        $form = $this->createCreateForm($entity);

        return $this->render('AmapBundle:ContratConsommateur:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ContratConsommateur entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmapBundle:ContratConsommateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ContratConsommateur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmapBundle:ContratConsommateur:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ContratConsommateur entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmapBundle:ContratConsommateur')->find($id);
        $paniers = $em->getRepository('AmapBundle:Panier')->findBy(
                array("saison" => $entity->getSaison(),
                    "statut" => Panier::STATUT_TYPE,
                    "amap" => $entity->getConsommateur()->getAmap()));
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ContratConsommateur entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmapBundle:ContratConsommateur:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
                    'paniers' => $paniers,
        ));
    }

    /**
     * Creates a form to edit a ContratConsommateur entity.
     *
     * @param ContratConsommateur $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(ContratConsommateur $entity) {
        $form = $this->createForm(new ContratConsommateurType(), $entity, array(
            'action' => $this->generateUrl('contratConsommateur_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing ContratConsommateur entity.
     *
     */
    public function updateAction(Request $request, $id) {
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

            return $this->redirect($this->generateUrl('contratConsommateur_edit', array('id' => $id)));
        }

        return $this->render('AmapBundle:ContratConsommateur:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ContratConsommateur entity.
     *
     */
    public function deleteAction(Request $request, $id) {
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

        return $this->redirect($this->generateUrl('contratConsommateur'));
    }

    /**
     * Creates a form to delete a ContratConsommateur entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('contratConsommateur_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }

}
