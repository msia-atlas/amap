<?php

namespace AmapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;
/**
 * User
 */
class Personne extends BaseUser
{
    /**
     * @var integer
     */
    private $id;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
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


}
