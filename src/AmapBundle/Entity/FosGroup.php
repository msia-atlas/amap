<?php

namespace AmapBundle\Entity;
use FOS\UserBundle\Model\Group as BaseGroup;
use Doctrine\ORM\Mapping as ORM;

/**
 * FosGroup
 */
class FosGroup extends BaseGroup
{
    /**
     * @var integer
     */
    protected $id;
    
    private  $publique;
    function getPublique() {
        return $this->publique;
    }

    function setPublique($publique) {
        $this->publique = $publique;
    }

    
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    
    }
    public function __toString() {
        return $this->name;
    }

    


}
