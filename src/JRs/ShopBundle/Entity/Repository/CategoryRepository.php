<?php

namespace JRs\ShopBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
class CategoryRepository extends EntityRepository{

    public function getCategoryList(){
        $qb=$this->createQueryBuilder('c')
            ->select('c')
            ->addOrderBy('c.name', 'DESC');

        return $qb->getQuery()->getResult();
    }
} 