<?php

namespace AmapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contrat
 */
class Contrat {

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
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set dateSignature
     *
     * @param \DateTime $dateSignature
     * @return Contrat
     */
    public function setDateSignature($dateSignature) {
        $this->dateSignature = $dateSignature;

        return $this;
    }

    /**
     * Get dateSignature
     *
     * @return \DateTime 
     */
    public function getDateSignature() {
        return $this->dateSignature;
    }

    /**
     * Set statut
     *
     * @param string $statut
     * @return Contrat
     */
    public function setStatut($statut) {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return string 
     */
    public function getStatut() {
        return $this->statut;
    }

}
