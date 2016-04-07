<?php

namespace AmapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Journal
 */
class Journal
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var boolean
     */
    private $typeES;

    /**
     * @var string
     */
    private $produit;

    /**
     * @var float
     */
    private $quantite;

    /**
     * @var string
     */
    private $producteur;

    /**
     * @var \DateTime
     */
    private $date;


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
     * Set typeES
     *
     * @param boolean $typeES
     * @return Journal
     */
    public function setTypeES($typeES)
    {
        $this->typeES = $typeES;

        return $this;
    }

    /**
     * Get typeES
     *
     * @return boolean 
     */
    public function getTypeES()
    {
        return $this->typeES;
    }

    /**
     * Set produit
     *
     * @param string $produit
     * @return Journal
     */
    public function setProduit($produit)
    {
        $this->produit = $produit;

        return $this;
    }

    /**
     * Get produit
     *
     * @return string 
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * Set quantite
     *
     * @param float $quantite
     * @return Journal
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return float 
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set producteur
     *
     * @param string $producteur
     * @return Journal
     */
    public function setProducteur($producteur)
    {
        $this->producteur = $producteur;

        return $this;
    }

    /**
     * Get producteur
     *
     * @return string 
     */
    public function getProducteur()
    {
        return $this->producteur;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Journal
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }
}
