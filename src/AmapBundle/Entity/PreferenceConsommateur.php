<?php

namespace AmapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PreferenceConsommateur
 */
class PreferenceConsommateur {

    public static $PREFERENCE_OK = "oui";
    public static $PREFERENCE_NOK = "non";
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $produit;

    /**
     *
     * @var Personne
     */
    private $consommateur;

    /**
     * @var string
     */
    private $preference;

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
     * @return PreferenceConsommateur
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
     * Set preference
     *
     * @param string $preference
     * @return PreferenceConsommateur
     */
    public function setPreference($preference) {
        $this->preference = $preference;

        return $this;
    }

    /**
     * Get preference
     *
     * @return string 
     */
    public function getPreference() {
        return $this->preference;
    }

    function getConsommateur() {
        return $this->consommateur;
    }

    function setConsommateur(Personne $consommateur) {
        $this->consommateur = $consommateur;
    }

}
