<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    // /**
    //  * @return Product[] Returns an array of Product objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Product
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    //Requete avec le queryBuilder
    
    /**
     * Cette methode doit retourner les 4produits les plus récents de la BDD, appelée sur notre page d'accueil afin d'afficher les 4 produits.
     */
    public function findMoreNew(int $number = 4)
    {
        $qb = $this->createQueryBuilder('p')
            ->orderBy('p.date', 'DESC')
            ->setMaxResults($number)// 4
            ->getQuery();
        return $qb->getResult();
    }

    /**
     * Cette methode doit retourner 4 produits aléatoires de la bdd
     */
    public function findRandom()
    {

    }

    /**
     * Cette méthode retourne le produit coup de coeur
     */
    public function findCoupdecoeur()
    {
        $qb = $this->createQueryBuilder('p')
           ->andWhere('p.coupdecoeur =  1')
           ->setMaxResults(1)
           ->getQuery();
       return $qb->getResult();
    }
}
