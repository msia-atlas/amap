<?php

namespace AmapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContratConsommateur
 */
class ContratConsommateur extends Contrat
{

    /**
     * @var string
     */
    private $consommateur;

    /**
     * @var array
     */
    private $listeLivraison;


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
     * Set consommateur
     *
     * @param string $consommateur
     * @return ContratConsommateur
     */
    public function setConsommateur($consommateur)
    {
        $this->consommateur = $consommateur;

        return $this;
    }

    /**
     * Get consommateur
     *
     * @return string 
     */
    public function getConsommateur()
    {
        return $this->consommateur;
    }

    /**
     * Set listeLivraison
     *
     * @param array $listeLivraison
     * @return ContratConsommateur
     */
    public function setListeLivraison($listeLivraison)
    {
        $this->listeLivraison = $listeLivraison;

        return $this;
    }

    /**
     * Get listeLivraison
     *
     * @return array 
     */
    public function getListeLivraison()
    {
        return $this->listeLivraison;
    }
}
