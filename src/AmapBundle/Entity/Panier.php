<?php

namespace AmapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Panier
 */
class Panier
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $typePanier;

    /**
     * @var \DateTime
     */
    private $dateCreation;

    /**
     * @var array
     */
    private $lignePanier;

    /**
     * @var string
     */
    private $statut;


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
     * Set typePanier
     *
     * @param string $typePanier
     * @return Panier
     */
    public function setTypePanier($typePanier)
    {
        $this->typePanier = $typePanier;

        return $this;
    }

    /**
     * Get typePanier
     *
     * @return string 
     */
    public function getTypePanier()
    {
        return $this->typePanier;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return Panier
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime 
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set lignePanier
     *
     * @param array $lignePanier
     * @return Panier
     */
    public function setLignePanier($lignePanier)
    {
        $this->lignePanier = $lignePanier;

        return $this;
    }

    /**
     * Get lignePanier
     *
     * @return array 
     */
    public function getLignePanier()
    {
        return $this->lignePanier;
    }

    /**
     * Set statut
     *
     * @param string $statut
     * @return Panier
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return string 
     */
    public function getStatut()
    {
        return $this->statut;
    }
}
