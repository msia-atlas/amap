<?php

namespace AmapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;



/**
 * Produit
 */
class Produit
{
   const TYPE_FRUIT= "typeFruit";
   const TYPE_ELEVAGE ="typeElevage";
   const TYPE_LEGUME = "typeLegume";
    
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
    private $saison;

    /**
     * @var string
     */
    private $typeProduit;

    /**
     * @var string
     */
    private $uniteMesure;

    /**
     * @var float
     */
    private $prixUnitaire;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     * @return Produit
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set saison
     *
     * @param string $saison
     * @return Produit
     */
    public function setSaison($saison)
    {
        $this->saison = $saison;

        return $this;
    }

    /**
     * Get saison
     *
     * @return string 
     */
    public function getSaison()
    {
        return $this->saison;
    }

    /**
     * Set typeProduit
     *
     * @param string $typeProduit
     * @return Produit
     */
    public function setTypeProduit($typeProduit)
    {
        $this->typeProduit = $typeProduit;

        return $this;
    }

    /**
     * Get typeProduit
     *
     * @return string 
     */
    public function getTypeProduit()
    {
        return $this->typeProduit;
    }

    /**
     * Set uniteMesure
     *
     * @param string $uniteMesure
     * @return Produit
     */
    public function setUniteMesure($uniteMesure)
    {
        $this->uniteMesure = $uniteMesure;

        return $this;
    }

    /**
     * Get uniteMesure
     *
     * @return string 
     */
    public function getUniteMesure()
    {
        return $this->uniteMesure;
    }

    /**
     * Set prixUnitaire
     *
     * @param float $prixUnitaire
     * @return Produit
     */
    public function setPrixUnitaire($prixUnitaire)
    {
        $this->prixUnitaire = $prixUnitaire;

        return $this;
    }

    /**
     * Get prixUnitaire
     *
     * @return float 
     */
    public function getPrixUnitaire()
    {
        return $this->prixUnitaire;
    }
    public function __toString() {
        return $this->libelle;
    }

}
