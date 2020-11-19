<?php

namespace App\Repository;

use App\Entity\Commentaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Commentaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method Commentaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method Commentaire[]    findAll()
 * @method Commentaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommentaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Commentaire::class);
    }

    public function commentaire($id)
    {
        return $this->createQueryBuilder('c')
            ->select('c' )
            ->orderBy('c.id', 'ASC' )
            ->orderBy('c.createdAt', 'DESC')
            ->join('c.produit','p')
            ->where('p.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult()
            ;
    }




    // /**
    //  * @return Commentaire[] Returns an array of Commentaire objects
    //  */
    /*
      public function commentaire()
    {
        return $this->createQueryBuilder('p')
            ->select('p,c' )
            ->Join('p.commentaires', 'c')
            ->orderBy('c.createdAt', 'ASC')
            ->getQuery()
            ->getResult()
            ;
    }

    /*
    public function findOneBySomeField($value): ?Commentaire
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
