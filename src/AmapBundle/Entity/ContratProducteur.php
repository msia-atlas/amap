<?php

namespace AmapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContratProducteur
 */
class ContratProducteur extends Contrat
{
    /**
     * @var string
     */
    private $producteur;

    /**
     * @var integer
     */
    private $quantiteAProduire;


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
     * Set producteur
     *
     * @param string $producteur
     * @return ContratProducteur
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
     * Set quantiteAProduire
     *
     * @param integer $quantiteAProduire
     * @return ContratProducteur
     */
    public function setQuantiteAProduire($quantiteAProduire)
    {
        $this->quantiteAProduire = $quantiteAProduire;

        return $this;
    }

    /**
     * Get quantiteAProduire
     *
     * @return integer 
     */
    public function getQuantiteAProduire()
    {
        return $this->quantiteAProduire;
    }
}
