<?php

namespace JRs\ShopBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends EntityRepository
{
    public function getUsersList(){
        $qb=$this->createQueryBuilder('u')
            ->select('u')
            ->addOrderBy('u.login', 'DESC');

        return $qb->getQuery()->getResult();
    }
}
