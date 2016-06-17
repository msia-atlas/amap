<?php

namespace AmapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContratConsommateur
 */
class ContratConsommateur {
  const STATUT_CREATE = "A valider";
    const STATUT_AVSALIDER = "En attente de validation par le responsable de l'AMAP";
    const STATUT_APAYER = "En attente de payement";
    const STATUT_VALIDER = "Validé";
    const STATUT_TERMINER = "Termié";

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
     * @var Personne
     */
    private $consommateur;

    /**
     * @var array
     */
    private $listeLivraison;

    /**
     *
     * @var Saison
     */
    private $saison;



    /**
     * Set consommateur
     *
     * @param string $consommateur
     * @return ContratConsommateur
     */
    public function setConsommateur($consommateur) {
        $this->consommateur = $consommateur;

        return $this;
    }

    /**
     * Get consommateur
     *
     * @return string 
     */
    public function getConsommateur() {
        return $this->consommateur;
    }

    /**
     * Set listeLivraison
     *
     * @param array $listeLivraison
     * @return ContratConsommateur
     */
    public function setListeLivraison($listeLivraison) {
        $this->listeLivraison = $listeLivraison;

        return $this;
    }

    /**
     * Get listeLivraison
     *
     * @return array 
     */
    public function getListeLivraison() {
        return $this->listeLivraison;
    }

    function getSaison() {
        return $this->saison;
    }

    function setSaison(Saison $saison) {
        $this->saison = $saison;
    }
    function getId() {
        return $this->id;
    }

    function getDateSignature() {
        return $this->dateSignature;
    }

    function getStatut() {
        return $this->statut;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDateSignature(\DateTime $dateSignature) {
        $this->dateSignature = $dateSignature;
    }

    function setStatut($statut) {
        $this->statut = $statut;
    }


}
