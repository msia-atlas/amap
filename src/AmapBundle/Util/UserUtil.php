<?php
namespace AmapBundle\Util;

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
   public static function getCourrentUser($controleur,$typeNeeded){
         $user= $controleur->get('security.context')->getToken()->getUser();

       if ($user != null && $user->getGroups()[0]->getId() ==$typeNeeded) {
           return $user;
       }else{
           return false;
       }
   }
}
