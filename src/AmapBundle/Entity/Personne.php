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

    public static $TYPE_CONSOMMATEUR = 2;
    public static $TYPE_PRODUCTEUR = 4;
    public static $TYPE_VOLONTAIRE = 3;
    public static $TYPE_RESPONSABLE = 1;
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

    private $procuration;
    
        /**
     * @var array
     */
    private $disponibilite;

    /**
     * @var integer
     */
    private $indiceConfiance;
    
    private $productions;
    
    private $groupName;
    /**
     *
     * @var Amap 
     */
    private $amap;
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
        $this->groupName = $groups->getName();
    }

    static function getTYPE_CONSOMMATEUR() {
        return self::$TYPE_CONSOMMATEUR;
    }



    function getProcuration() {
        return $this->procuration;
    }

    function getProduitsQuantite() {
        return $this->produitsQuantite;
    }



    function getIndiceConfiance() {
        return $this->indiceConfiance;
    }

    function setProcuration($procuration) {
        $this->procuration = $procuration;
    }


    function setDisponibilite($disponibilite) {
        $this->disponibilite = $disponibilite;
    }

    function setIndiceConfiance($indiceConfiance) {
        $this->indiceConfiance = $indiceConfiance;
    }
    function getGroupName() {
        if($this->groupName ==null){
           $this->groupName = $this->groups[0]->getName(); 
        }
        return $this->groupName;
    }

    function setGroupName($groupName) {
        $this->groupName = $groupName;
    }
    function getAmap() {
        return $this->amap;
    }

    function setAmap(Amap $amap) {
        $this->amap = $amap;
    }







}
