<?php

namespace AmapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Volontaire
 */
class Volontaire
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var array
     */
    private $disponibilite;

    /**
     * @var integer
     */
    private $indiceConfiance;


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
     * Set disponibilite
     *
     * @param array $disponibilite
     * @return Volontaire
     */
    public function setDisponibilite($disponibilite)
    {
        $this->disponibilite = $disponibilite;

        return $this;
    }

    /**
     * Get disponibilite
     *
     * @return array 
     */
    public function getDisponibilite()
    {
        return $this->disponibilite;
    }

    /**
     * Set indiceConfiance
     *
     * @param integer $indiceConfiance
     * @return Volontaire
     */
    public function setIndiceConfiance($indiceConfiance)
    {
        $this->indiceConfiance = $indiceConfiance;

        return $this;
    }

    /**
     * Get indiceConfiance
     *
     * @return integer 
     */
    public function getIndiceConfiance()
    {
        return $this->indiceConfiance;
    }
}
