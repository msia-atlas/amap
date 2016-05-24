<?php
namespace  AmapBundle\Repository;
 
use Doctrine\ORM\EntityRepository;
 use AmapBundle\Entity\Consommateur;
class PersonneRepository extends EntityRepository
{
    public function getAllResponsable(){
       $qb = $this->getEntityManager()->createQueryBuilder();
       $query =$qb->select('p')
               ->from('AmapBundle\Entity\Personne', 'p')
               ->innerJoin('AmapBundle\Entity\FosGroup', 'f')
               ->where('p.groupName = :nom')
               ->setParameter('nom',"ResponsableAmap")
               ->getQuery();
       return $query->getResult();
       
    }
}
