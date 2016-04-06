<?php

namespace AmapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Livraison
 */
class Livraison
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $panier;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var string
     */
    private $pointLivraison;


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
     * Set panier
     *
     * @param string $panier
     * @return Livraison
     */
    public function setPanier($panier)
    {
        $this->panier = $panier;

        return $this;
    }

    /**
     * Get panier
     *
     * @return string 
     */
    public function getPanier()
    {
        return $this->panier;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Livraison
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

    /**
     * Set pointLivraison
     *
     * @param string $pointLivraison
     * @return Livraison
     */
    public function setPointLivraison($pointLivraison)
    {
        $this->pointLivraison = $pointLivraison;

        return $this;
    }

    /**
     * Get pointLivraison
     *
     * @return string 
     */
    public function getPointLivraison()
    {
        return $this->pointLivraison;
    }
}
