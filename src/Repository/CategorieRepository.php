<?php

namespace App\Repository;

use App\Entity\Categorie;
use App\Entity\Portefeuille;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Categorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Categorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Categorie[]    findAll()
 * @method Categorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Categorie::class);
    }

    public function findByExampleField()
    {
        return $this->createQueryBuilder('c')
            ->select('c' )
            ->join('c.produits', 'x')
            ->Where('x.dateDebut < :now')
            ->orWhere('x.dateFin > :now')
            ->setParameter('now', new \DateTime('now'))
            ->getQuery()
            ->getResult()
            ;
    }

    public function findByExampleField2($id)
    {
        return $this->createQueryBuilder('c')
            ->select('p,c' )
            ->join('c.produits', 'p')
            ->Where('p.dateDebut < :now')
            ->setParameter('now', new \DateTime('now'))
            ->andwhere('p.id= :produit_id')
            ->setParameter('produit_id', $id)
            ->getQuery()
            ->getResult()
            ;
    }



    // /**
    //  * @return Categorie[] Returns an array of Categorie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Categorie
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
