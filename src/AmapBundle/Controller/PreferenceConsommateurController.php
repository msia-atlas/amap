<?php

namespace AmapBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AmapBundle\Entity\PreferenceConsommateur;
use AmapBundle\Form\PreferenceConsommateurType;
use \Symfony\Component\HttpFoundation\JsonResponse;

/**
 * PreferenceConsommateur controller.
 *
 */
class PreferenceConsommateurController extends Controller {

    /**
     * Lists all PreferenceConsommateur entities.
     *
     */
    public function indexAction() {
        /* @var $em AbstractManagerRegistry|ObjectManager */
        $em = $this->getDoctrine()->getManager();
        //echo(     $courrentUser = $this->get('security.context')->getToken()->getUser());

        $courrentUser = $this->get('security.context')->getToken()->getUser();
       // $courrentUser = $em->getRepository('AmapBundle:Personne')->findOneByUsername($courrentUserName);
    var_dump($courrentUser->getGroups()[0]->getId());
        if ($courrentUser != null && $courrentUser->getGroups()[0]->getId() == \AmapBundle\Entity\Personne::$TYPE_CONSOMMATEUR) {
            $aPreferences = $em->getRepository('AmapBundle:PreferenceConsommateur')->findBy(array('consommateur' => $courrentUser));
            $aProduits = $em->getRepository('AmapBundle:Produit')->findAll();

            if (count($aProduits) != count($aPreferences)) {
                foreach ($aProduits as $oProduit) {

                    $bPreferenceExist = false;
                    if ($aPreferences != null) {
                        foreach ($aPreferences as $oPreference) {

                            if ($oPreference->getProduit()->getId() == $oProduit->getId()) {

                                $bPreferenceExist = true;
                            }
                        }
                    } else {
                        $aPreferences = array();
                    }

                    if ($bPreferenceExist == false) {
                        $oNewPreference = new PreferenceConsommateur();
                        $oNewPreference->setProduit($oProduit);
                        $oNewPreference->setConsommateur($courrentUser);
                        $oNewPreference->setPreference(PreferenceConsommateur::$PREFERENCE_OK);
                        $em->persist($oNewPreference);

                        array_push($aPreferences, $oNewPreference);
                    }
                }
            }

            $em->flush();
            return $this->render('AmapBundle:PreferenceConsommateur:index.html.twig', array(
                        'entities' => $aPreferences,
            ));
        }else{
             return $this->render('AmapBundle:Default:notAllowed.html.twig', array(
            ));
        }
    }

    /**
     * Creates a new PreferenceConsommateur entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new PreferenceConsommateur();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('preferenceConsommateur_show', array('id' => $entity->getId())));
        }

        return $this->render('AmapBundle:PreferenceConsommateur:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a PreferenceConsommateur entity.
     *
     * @param PreferenceConsommateur $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(PreferenceConsommateur $entity) {
        $form = $this->createForm(new PreferenceConsommateurType(), $entity, array(
            'action' => $this->generateUrl('preferenceConsommateur_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new PreferenceConsommateur entity.
     *
     */
    public function newAction() {
        $entity = new PreferenceConsommateur();
        $form = $this->createCreateForm($entity);

        return $this->render('AmapBundle:PreferenceConsommateur:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a PreferenceConsommateur entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmapBundle:PreferenceConsommateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PreferenceConsommateur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmapBundle:PreferenceConsommateur:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing PreferenceConsommateur entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmapBundle:PreferenceConsommateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PreferenceConsommateur entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AmapBundle:PreferenceConsommateur:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a PreferenceConsommateur entity.
     *
     * @param PreferenceConsommateur $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(PreferenceConsommateur $entity) {
        $form = $this->createForm(new PreferenceConsommateurType(), $entity, array(
            'action' => $this->generateUrl('preferenceConsommateur_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing PreferenceConsommateur entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AmapBundle:PreferenceConsommateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PreferenceConsommateur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('preferenceConsommateur_edit', array('id' => $id)));
        }

        return $this->render('AmapBundle:PreferenceConsommateur:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a PreferenceConsommateur entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AmapBundle:PreferenceConsommateur')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find PreferenceConsommateur entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('preferenceConsommateur'));
    }

    /**
     * Creates a form to delete a PreferenceConsommateur entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('preferenceConsommateur_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }

    public function savePreferenceAction(Request $request) {
        /* @var $em AbstractManagerRegistry|ObjectManager */
        $em = $this->getDoctrine()->getManager();
        $id = $request->get('id');
        $statut = $request->get('statut');
        $response = new JsonResponse();
        if ($id != null && ($statut == PreferenceConsommateur::$PREFERENCE_OK || $statut == PreferenceConsommateur::$PREFERENCE_NOK)) {
            /* @var $oPreference  PreferenceConsommateur */
            $oPreference = $em->getRepository('AmapBundle:PreferenceConsommateur')->find($id);

            if ($oPreference) {
                $em->persist($oPreference);
                $oPreference->setPreference($statut);
                $em->flush();
                $response->setData(array(
                    'save' => true,
                    'error' => null
                ));
            }
        } else {
            $response->setData(array(
                'save' => false,
                'error' => 'Les paremètres ne sont pas correcte'
            ));
        }
        return $response;
    }

}
