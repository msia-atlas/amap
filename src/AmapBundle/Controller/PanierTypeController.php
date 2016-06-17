<?php

namespace AmapBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AmapBundle\Entity\Panier;
use AmapBundle\Form\PanierTypeType;
use DateTime;
use AmapBundle\Util\UserUtil;
use AmapBundle\Entity\Personne;
/**
 * Panier controller.
 *
 */
class PanierTypeController extends Controller
{

    /**
     * Lists all Panier entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AmapBundle:Panier')->findBy(array('statut'=>  Panier::STATUT_TYPE));

        return $this->render('AmapBundle:PanierType:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Panier entity.
     *
     */
    public function createAction(Request $request)
    {
        $user =UserUtil::getCourrentUser($this,  Personne::$TYPE_RESPONSABLE );
        $entity = new Panier();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $entity->setDateCreation(new DateTime());
        $entity->setStatut(Panier::STATUT_TYPE);
        $entity->setAmap($user->getAmap());
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            foreach($entity->getLignesPanier() as $ligne){
                $ligne->setPanier($entity);
            }
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
     * Creates a form to create a Panier entity.
     *
     * @param Panier $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Panier $entity)
    {
        $form = $this->createForm(new PanierTypeType(), $entity, array(
            'action' => $this->generateUrl('panierType_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Ajouter','attr'=>['class'=>'"btn btn-success pull-right"']));

        return $form;
    }
    /**
     * Creates a form to create a Panier entity.
     *
     * @param Panier $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function creatLignePanierForm(LignePanier $entity)
    {
        $form = $this->createForm(new LignePanier(), $entity, array(
            'action' => $this->generateUrl('panierType_create'),
            'method' => 'POST',
        ));
        return $form;
    }
    /**
     * Displays a form to create a new Panier entity.
     *
     */
    public function newAction()
    {
        $entity = new Panier();
        $form   = $this->createCreateForm($entity);
       
        return $this->render('AmapBundle:PanierType:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Panier entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        /* @var $entity Panier */
        $entity = $em->getRepository('AmapBundle:Panier')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Panier entity.');
        }
       
        foreach($entity->getLignesPanier() as $ligne){
             var_dump($ligne->getProduit()->getLibelle());
        }
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmapBundle:PanierType:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Panier entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmapBundle:Panier')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Panier entity.');
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
    * Creates a form to edit a Panier entity.
    *
    * @param Panier $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Panier $entity)
    {
        $form = $this->createForm(new PanierTypeType(), $entity, array(
            'action' => $this->generateUrl('panierType_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Panier entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmapBundle:Panier')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Panier entity.');
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
     * Deletes a Panier entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AmapBundle:Panier')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Panier entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('panierType'));
    }

    /**
     * Creates a form to delete a Panier entity by id.
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
