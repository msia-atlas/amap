<?php

namespace AmapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AmapBundle\Repository\ConsommateurRepository;

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
    

    function getUserName() {
        return $this->userName;
    }

    function setUserName($userName) {
        $this->userName = $userName;
    }



}
