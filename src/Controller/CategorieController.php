<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Commentaire;
use App\Entity\Produit;
use App\Form\CommentaireType;
use DateTime;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    /**
     * @Route("/", name="", requirements={"cat"="[a-zA-Z0-9]+"}))
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(categorie::class)->findByExampleField();

        return $this->render('categorie/index.html.twig', [
            'repo' => $repo,
        ]);
    }

    /**
     * @Route("/{nom}", name="categorie", requirements={"cat"="[a-zA-Z0-9]+"}))
     */
    public function produit($nom): Response
    {
        $repo = $this->getDoctrine()->getRepository(produit::class)->findByExampleField2($nom);

        return $this->render('categorie/produit.html.twig', [
            'repo' => $repo,
        ]);
    }

    /**
     * @Route("/{nom}/{reference}", name="reference", requirements={"cat"="[a-zA-Z0-9]+"}))
     *
     */
    public function reference($reference, Request $request, Produit $produit): Response
    {
        $repo = $this->getDoctrine()->getRepository(produit::class)->findByExampleField3($reference);

        $post = new Commentaire();

        $form = $this->createForm(CommentaireType::class, $post);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $post->setProduit($produit);
            $doctrine = $this->getDoctrine()->getManager();

            $doctrine->persist($post);
            $doctrine->flush();
        }

        $commentaire = $this->getDoctrine()->getRepository(commentaire::class)->commentaire($produit->getId());

        return $this->render('categorie/reference.html.twig', [
            'repo' => $repo,
            'form' => $form->createView(),
            'commentaire'=> $commentaire

        ]);
    }

}
