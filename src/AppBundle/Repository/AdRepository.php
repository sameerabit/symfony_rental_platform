<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Ad;
use Doctrine\ORM\EntityManagerInterface;

/**
 * AdRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AdRepository extends \Doctrine\ORM\EntityRepository
{

    public function getFilteredAds($filters = array(), $isAjax)
    {
        $qb = $this->getEntityManager()->getRepository(Ad::class)
            ->createQueryBuilder('ad')
            ->select('ad,c,l,ft,p')
            ->innerJoin('ad.subCategory', 'c')
            ->innerJoin('ad.location', 'l')
            ->innerJoin('ad.frequencyType', 'ft')
            ->leftJoin('ad.photos', 'p')
            ->where('ad.state = :status')
            ->setParameter('status','Not Published')
            ->addOrderBy('ad.id','DESC');
        if (count($filters)>0) {
            if(array_key_exists("categoryId",$filters)){
                $qb->andWhere('c.id = :categoryId')
                    ->setParameter('categoryId', $filters["categoryId"]);
            }
            if(array_key_exists("locationId",$filters)){
                $qb->andWhere('l.id = :locationId')
                    ->setParameter('locationId', $filters["locationId"]);
            }
            if(array_key_exists("searchQuery",$filters)){
                $qb->andWhere('ad.title LIKE :title')
                    ->setParameter('title', "%".$filters["searchQuery"]."%");
            }
            if(array_key_exists("user",$filters)){
                $qb->andWhere('ad.user = :user')
                    ->setParameter('user', $filters["user"]);
            }
        }
        $result = $qb->getQuery();
        return $result;
    }

    public function getFilteredAdsByMainCategory($filters = array()){
        $qb = $this->getEntityManager()->getRepository(Ad::class)
            ->createQueryBuilder('ad')
            ->select('ad,sc,l,ft,p')
            ->innerJoin('ad.subCategory', 'sc')
            ->innerJoin('sc.category', 'c')
            ->innerJoin('ad.location', 'l')
            ->innerJoin('ad.frequencyType', 'ft')
            ->leftJoin('ad.photos', 'p')
            ->where('ad.state = :status')
            ->setParameter('status','Not Published')
            ->addOrderBy('ad.id','DESC');
        if (count($filters)>0) {
            if(array_key_exists("locationId",$filters)){
                $qb->andWhere('l.id = :locationId')
                    ->setParameter('locationId', $filters["locationId"]);
            }
            if(array_key_exists("mainCategoryId",$filters)){
                $qb->andWhere('c.id = :mainCategoryId')
                    ->setParameter('mainCategoryId', $filters["mainCategoryId"]);
            }
        }
        $result = $qb->getQuery();
        return $result;
    }

    public function store($ad,$user){
        $ad->setUser($user);
        $ad->setCreatedAt(new \DateTime(date("Y-m-d")));
        $ad->setState("Not Published");
        $uniqueId = uniqid();
        $ad->setAdNumber($uniqueId);
        $entityManager = $this->getEntityManager();
        $entityManager->persist($ad);
        $entityManager->flush();
        return $ad;
    }

}
