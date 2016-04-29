<?php

namespace AmapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Producteur
 */
class Producteur extends Personne
{


    /**
     * @var array
     */
    private $produitsQuantite;


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
     * Set produitsQuantite
     *
     * @param array $produitsQuantite
     * @return Producteur
     */
    public function setProduitsQuantite($produitsQuantite)
    {
        $this->produitsQuantite = $produitsQuantite;

        return $this;
    }

    /**
     * Get produitsQuantite
     *
     * @return array 
     */
    public function getProduitsQuantite()
    {
        return $this->produitsQuantite;
    }
}
