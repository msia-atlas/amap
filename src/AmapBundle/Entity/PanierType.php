<?php

namespace AmapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PanierType
 */
class PanierType {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var Saison
     */
    private $saison;

    /**
     * @var array(LignePanier)
     */
    private $lignesPanier;

    /**
     * @var string
     */
    private $libelle;
    /**
     *
     * @var Amap 
     */
    private $amap;
    /**
     *
     * @var string 
     */
    private $typePanier;
    /**
     *
     * @var flaot
     */
    private $prix;
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set saison
     *
     * @param string $saison
     * @return PanierType
     */
    public function setSaison(Saison $saison) {
        $this->saison = $saison;

        return $this;
    }

    /**
     * Get saison
     *
     * @return string 
     */
    public function getSaison() {
        return $this->saison;
    }

    /**
     * Set lignesPanier
     *
     * @param string $lignesPanier
     * @return PanierType
     */
    public function setLignesPanier($lignesPanier) {
        $this->lignesPanier = $lignesPanier;

        return $this;
    }


    /**
     * Get lignesPanier
     *
     * @return LignePanier[] 
     */
    public function getLignesPanier() {
        return $this->lignesPanier;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     * @return PanierType
     */
    public function setLibelle($libelle) {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle() {
        return $this->libelle;
    }
    function getAmap() {
        return $this->amap;
    }

    function setAmap(Amap $amap) {
        $this->amap = $amap;
    }

    function getTypePanier() {
        return $this->typePanier;
    }

    function getPrix() {
        return $this->prix;
    }

    function setTypePanier($typePanier) {
        $this->typePanier = $typePanier;
    }

    function setPrix(flaot $prix) {
        $this->prix = $prix;
    }


}
