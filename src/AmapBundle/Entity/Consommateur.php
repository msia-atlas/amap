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
    public  function loadFromParentObj( $parentObj )
    {
        $objValues = get_object_vars($parentObj); // return array of object values
        foreach($objValues AS $key=>$value)
        {
             $this->$key = $value;
        }
    }

    public function setId(){
        $this->id = null;
    }


}
