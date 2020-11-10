<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Commentaire;
use App\Entity\Produit;
use App\Form\CommentaireType;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    /**
     * @Route("/", name="")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(categorie::class)->findByExampleField();


        return $this->render('categorie/index.html.twig', [
            'repo' => $repo,
        ]);
    }

    /**
     * @Route("/categorie/{id}", name="categorie")
     */
    public function produit($id): Response
    {
        $repo = $this->getDoctrine()->getRepository(produit::class)->findByExampleField2($id);

        return $this->render('categorie/produit.html.twig', [
            'repo' => $repo,
        ]);
    }

    /**
     * @Route("/categorie/ref/{id}", name="reference")
     */
    public function reference($id, Request $request, Produit $produit, EntityManager $em): Response
    {
        $repo = $this->getDoctrine()->getRepository(produit::class)->findByExampleField3($id);


        $post = new Commentaire();

        $form = $this->createForm(CommentaireType::class, $post);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $post->setProduit($produit->getId());
            $doctrine = $this->getDoctrine()->getManager();

            $doctrine->persist($post);
            $doctrine->flush();
        }


        $commentaire = $em->getRepository('commentaire')->findBy(
                array('id' => 'ASC')
            );

        return $this->render('categorie/reference.html.twig', [
            'repo' => $repo,
            'form' => $form->createView(),
            'commentaire'=>$commentaire
        ]);
    }

}
