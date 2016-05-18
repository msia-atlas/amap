<?php
namespace  AmapBundle\Repository;
 
use Doctrine\ORM\EntityRepository;
 use AmapBundle\Entity\Consommateur;
class ConsommateurRepository extends EntityRepository
{
    public function getById($id){
       $qb = $this->getEntityManager()->createQueryBuilder();
       $query =$qb->select('c')
               ->from('AmapBundle\Entity\Consommateur', 'c')
               ->where('c.id = :id')
               ->setParameter('id', $id)->getQuery();
       return $query->getOneOrNullResult();
       
    }
}
