<?php

namespace AmapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PointLivraison
 */
class PointLivraison
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
    private $nomPointLivraison;


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
     * @return PointLivraison
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
     * Set nomPointLivraison
     *
     * @param string $nomPointLivraison
     * @return PointLivraison
     */
    public function setNomPointLivraison($nomPointLivraison)
    {
        $this->nomPointLivraison = $nomPointLivraison;

        return $this;
    }

    /**
     * Get nomPointLivraison
     *
     * @return string 
     */
    public function getNomPointLivraison()
    {
        return $this->nomPointLivraison;
    }
}
