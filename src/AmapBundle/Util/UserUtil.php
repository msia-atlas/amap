<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserUtil
 *
 * @author Thais Martet
 */
class UserUtil {
   public static function checkUserConnected($controleur,$typeNeeded){
         $user= $courrentUser = $controleur->get('security.context')->getToken()->getUser();

       if ($user != null && $user->getGroups()[0]->getId() == \AmapBundle\Entity\Personne::$TYPE_CONSOMMATEUR) {
           return $user;
       }else{
           return false;
       }
   }
}
