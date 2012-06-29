<?php

namespace Evercode\Bundle\BannerBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class BannerRepository extends EntityRepository
{

    public function findOneRandom($place)
    {
        $em = $this->getEntityManager();

        $qb = $em->createQueryBuilder();
        $qb
            ->select('b')
            ->from('EvercodeBannerBundle:Banner', 'b')
            ->where('b.place = :place')
            ->setParameter('place', $place)
            ;

        $result = $qb->getQuery()->execute();

        if(count($result) > 1) {
            $entities = array();

            foreach ($result as $item) {
                $entities[] = $item;
            }

            $entity = $entities[array_rand($entities)];
        } else {
            $entity = current($result);
        }

        return $entity;
    }
}
