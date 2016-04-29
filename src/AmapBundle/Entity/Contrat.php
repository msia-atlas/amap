<?php

namespace AmapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contrat
 */
<<<<<<< HEAD
class  Contrat
=======
abstract class Contrat
>>>>>>> 3c0155268c47f5d7c634c6eb1b7a646c6ac757eb
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $dateSignature;

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
     * Set dateSignature
     *
     * @param \DateTime $dateSignature
     * @return Contrat
     */
    public function setDateSignature($dateSignature)
    {
        $this->dateSignature = $dateSignature;

        return $this;
    }

    /**
     * Get dateSignature
     *
     * @return \DateTime 
     */
    public function getDateSignature()
    {
        return $this->dateSignature;
    }

    /**
     * Set statut
     *
     * @param string $statut
     * @return Contrat
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
