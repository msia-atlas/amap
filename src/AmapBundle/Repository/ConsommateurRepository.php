<?php
namespace  AmapBundle\Repository;
 
use Doctrine\ORM\EntityRepository;
 use AmapBundle\Entity\Consommateur;
class ConsommateurRepository extends EntityRepository
{
    public function getByUserName($username){
       $qb = $this->getEntityManager()->createQueryBuilder();
       $query =$qb->select('c')
               ->from('AmapBundle\Entity\Consommateur', 'c')
               ->where('c.username = :username')
               ->setParameter('username', $username)->getQuery();
       return $query->getOneOrNullResult();
       
    }
}
