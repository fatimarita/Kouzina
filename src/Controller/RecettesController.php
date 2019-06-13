<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Repository\RecetteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class RecettesController extends AbstractController
{
    /**
     * @Route("/recettes", name="recettes")
     * @return Response
     */

    public function index(): Response
    {
        return $this->render('recettes/recettes.html.twig');
    }

    /**
     * @Route("/recettes/categorie/{id}", name="recette_cat")
     */
    public function showByCat(Categories $categories, RecetteRepository $recetteRepository)
    {
        return $this->render('salees/salees.html.twig', [
            'recettes' => $recetteRepository->findBy(['category' => $categories])
        ]);
    }
}

