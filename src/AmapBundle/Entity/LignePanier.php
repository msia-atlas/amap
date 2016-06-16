<?php

namespace AmapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LignePanier
 */
class LignePanier {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $quantite;

    /**
     * @var string
     */
    private $produit;

    /**
     * @var integer
     */
    private $quantiteParDefaut;

    /**
     *
     * @var Panier 
     */
    private $panier;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     * @return LignePanier
     */
    public function setQuantite($quantite) {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer 
     */
    public function getQuantite() {
        return $this->quantite;
    }

    /**
     * Set produit
     *
     * @param string $produit
     * @return LignePanier
     */
    public function setProduit($produit) {
        $this->produit = $produit;

        return $this;
    }

    /**
     * Get produit
     *
     * @return string 
     */
    public function getProduit() {
        return $this->produit;
    }

    /**
     * Set quantiteParDefaut
     *
     * @param integer $quantiteParDefaut
     * @return LignePanier
     */
    public function setQuantiteParDefaut($quantiteParDefaut) {
        $this->quantiteParDefaut = $quantiteParDefaut;

        return $this;
    }

    /**
     * Get quantiteParDefaut
     *
     * @return integer 
     */
    public function getQuantiteParDefaut() {
        return $this->quantiteParDefaut;
    }
    function getPanier() {
        return $this->panier;
    }

    function setPanier(Panier $panier) {
        $this->panier = $panier;
    }


}
