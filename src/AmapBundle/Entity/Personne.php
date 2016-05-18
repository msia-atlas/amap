<?php

namespace AmapBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use AmapBundle\Entity\Consommateur;
use AmapBundle\Repository\ConsommateurRepository;

/**
 * User
 */
class Personne extends BaseUser {

    public static $TYPE_CONSOMMATEUR = 1;
    public static $TYPE_PRODUCTEUR = 2;
    public static $TYPE_VOLONTAIRE = 3;
    public static $TYPE_RESPONSABLE = 4;
    public static $TYPE_ADMINISTRATEUR = 5;

    function __construct() {
        $this->salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
        $this->enabled = false;
        $this->locked = false;
        $this->expired = false;
        $this->roles = array();
        $this->credentialsExpired = false;
        $this->groups = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     *
     * @var string 
     */
    private $nom;

    /**
     *
     * @var string 
     */
    private $prenom;

    /**
     *
     * @var string 
     */
    private $adresse;

    /**
     * 
     * @var integer
     */
    protected $groups;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getAdresse() {
        return $this->adresse;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    function getGroups() {
        return $this->groups;
    }

    function setGroups($groups) {
        $this->groups = array($groups);
    }

    /**
     * 
     * @param AbstractManagerRegistry|ObjectManager $em
     */
    public function cast($em) {
        $id = $this->id;
        switch ($this->groups[0]->getName()) {
            case "ResponsableAmap":
                break;
            case "Consommateur":
                $user = $em->getRepository('AmapBundle:Consommateur')->getById($id);
                if (!$user) {
                    $user = new Consommateur();
                   // setDefautUser($user);
                }
                break;
        }
        return $user;
    }

    private function setDefautUser(Personne $user) {
        $user->setAdresse($this->adresse);
        $user->setNom($this->nom);
        $user->setPrenom($this->prenom);
        $user->setGroups($this->groups);
        return $user;
    }

}
