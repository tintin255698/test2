<?php

namespace App\twig;

use App\Entity\Produit;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class extension extends AbstractExtension
{
    public function isNouveaute(Produit $produit)
    {
        if($produit->dateDebut >= (new \DateTime("now"))->modify('-3 month')){    // si la date de début est supérieure ou égale à maintenant moins trois mois
            return true;
        }
        return false;
    }
}