<?php

namespace AmapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Consommateur
 */
class Consommateur extends Personne
{


    /**
     * @var string
     */
    private $procuration;


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
     * Set procuration
     *
     * @param string $procuration
     * @return Consommateur
     */
    public function setProcuration($procuration)
    {
        $this->procuration = $procuration;

        return $this;
    }

    /**
     * Get procuration
     *
     * @return string 
     */
    public function getProcuration()
    {
        return $this->procuration;
    }
}
