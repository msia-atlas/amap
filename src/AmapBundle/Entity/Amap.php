<?php

namespace AmapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Amap
 */
class Amap
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $adresse;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $responsable;


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
     * Set adresse
     *
     * @param string $adresse
     * @return Amap
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Amap
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set responsable
     *
     * @param string $responsable
     * @return Amap
     */
    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;

        return $this;
    }

    /**
     * Get responsable
     *
     * @return string 
     */
    public function getResponsable()
    {
        return $this->responsable;
    }
}
