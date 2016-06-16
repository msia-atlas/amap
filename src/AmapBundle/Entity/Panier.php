<?php

namespace AmapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Panier
 */
class Panier {

    const TYPE_PETIT = "Petit panier";
    const TYPE_MOYEN = "Panier moyen";
    const TYPE_CRAND = "Grand panier";
    const STATUT_TYPE = "Panier Type";
    /**
     * @var integer
     */
    private $id;
       /**
     * @var string
     */
    private $libelle;
    /**
     * @var string
     */
    private $typePanier;

    /**
     * @var \DateTime
     */
    private $dateCreation;
    /**
     * @var Saison
     */
    private $saison;
    /**
     * @var LignePanier[]
     */
    private $lignesPanier;

    /**
     * @var string
     */
    private $statut;
    /**
     *
     * @var float
     */
    private $prix;
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

    /**
     * Set typePanier
     *
     * @param string $typePanier
     * @return Panier
     */
    public function setTypePanier($typePanier) {
        $this->typePanier = $typePanier;

        return $this;
    }

    /**
     * Get typePanier
     *
     * @return string 
     */
    public function getTypePanier() {
        return $this->typePanier;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return Panier
     */
    public function setDateCreation($dateCreation) {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime 
     */
    public function getDateCreation() {
        return $this->dateCreation;
    }

    
    /**
     * Set statut
     *
     * @param string $statut
     * @return Panier
     */
    public function setStatut($statut) {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return string 
     */
    public function getStatut() {
        return $this->statut;
    }
    function getSaison() {
        return $this->saison;
    }

    function getPrix() {
        return $this->prix;
    }

    function getAmap() {
        return $this->amap;
    }

    function setSaison(Saison $saison) {
        $this->saison = $saison;
    }

    function setPrix( $prix) {
        $this->prix = $prix;
    }

    function setAmap(Amap $amap) {
        $this->amap = $amap;
    }

    function getLibelle() {
        return $this->libelle;
    }

    function setLibelle($libelle) {
        $this->libelle = $libelle;
    }

    function getLignesPanier() {
        return $this->lignesPanier;
    }

    function setLignesPanier( $lignesPanier) {
        $this->lignesPanier = $lignesPanier;
    }


}
