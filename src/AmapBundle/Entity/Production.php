<?php

namespace AmapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Production
 */
class Production {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $produit;

    /**
     * @var float
     */
    private $quantiteLivree;

    /**
     * @var \DateTime
     */
    private $dateLivraison;

    /**
     * @var \DateTime
     */
    private $dateLancement;

    /**
     * @var string
     */
    private $statut;
    /*
     * Personne
     */
    private $producteur;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set produit
     *
     * @param string $produit
     * @return Production
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
     * Set quantiteLivree
     *
     * @param float $quantiteLivree
     * @return Production
     */
    public function setQuantiteLivree($quantiteLivree) {
        $this->quantiteLivree = $quantiteLivree;

        return $this;
    }

    /**
     * Get quantiteLivree
     *
     * @return float 
     */
    public function getQuantiteLivree() {
        return $this->quantiteLivree;
    }

    /**
     * Set dateLivraison
     *
     * @param \DateTime $dateLivraison
     * @return Production
     */
    public function setDateLivraison($dateLivraison) {
        $this->dateLivraison = $dateLivraison;

        return $this;
    }

    /**
     * Get dateLivraison
     *
     * @return \DateTime 
     */
    public function getDateLivraison() {
        return $this->dateLivraison;
    }

    /**
     * Set dateLancement
     *
     * @param \DateTime $dateLancement
     * @return Production
     */
    public function setDateLancement($dateLancement) {
        $this->dateLancement = $dateLancement;

        return $this;
    }

    /**
     * Get dateLancement
     *
     * @return \DateTime 
     */
    public function getDateLancement() {
        return $this->dateLancement;
    }

    /**
     * Set statut
     *
     * @param string $statut
     * @return Production
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

    function getProducteur() {
        return $this->producteur;
    }

    function setProducteur(Personne $producteur) {
        $this->producteur = $producteur;
    }

}
