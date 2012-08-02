<?php

namespace Evercode\Bundle\BannerBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class BannerRepository extends EntityRepository
{

    public function findOneRandom($place)
    {
        $em = $this->getEntityManager();

        $now = new \DateTime();

        $qb = $em->createQueryBuilder();
        $qb
            ->select('b')
            ->from('EvercodeBannerBundle:Banner', 'b')
            ->where('b.place = :place')
            ->andWhere('b.start_date <= :now OR b.start_date IS NULL')
            ->andWhere('b.end_date >= :now OR b.end_date IS NULL')
            ->setParameter('place', $place)
            ->setParameter('now', $now)
        ;

        $result = $qb->getQuery()->execute();

        if ( count($result) > 1 ) {
            $entities = array();

            foreach ( $result as $item ) {
                $entities[] = $item;
            }

            $entity = $entities[array_rand($entities)];
        } else {
            $entity = current($result);
        }

        return $entity;
    }

}
