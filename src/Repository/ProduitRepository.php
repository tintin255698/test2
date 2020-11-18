<?php

namespace App\Repository;

use App\Entity\Produit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Produit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produit[]    findAll()
 * @method Produit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produit::class);
    }

    public function findByExampleField2($nom)
    {
        return $this->createQueryBuilder('p')
            ->select('p,x' )
            ->join('p.categorie', 'x')
            ->Where('p.dateFin > :now')
            ->orWhere('p.dateFin is NULL')
            ->setParameter('now', new \DateTime('now'))
            ->andwhere('x.noms= :produit_id')
            ->setParameter('produit_id', $nom)
            ->getQuery()
            ->getResult()
            ;
    }

    public function findByExampleField3($reference)
    {
        return $this->createQueryBuilder('p')
            ->select('p' )
            ->Where('p.dateFin > :now')
            ->orWhere('p.dateFin is NULL')
            ->setParameter('now', new \DateTime('now'))
            ->andwhere('p.reference= :produit_id')
            ->setParameter('produit_id', $reference)
            ->getQuery()
            ->getResult()
            ;
    }


    // /**
    //  * @return Produit[] Returns an array of Produit objects
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
    public function findOneBySomeField($value): ?Produit
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
