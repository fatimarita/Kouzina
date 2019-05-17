<?php

namespace App\Controller;

use App\Entity\Recette;
use App\Repository\RecetteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SaleesController extends AbstractController
{
    /**
     * @Route("/recettes salées", name="salees")
     * @param RecetteRepository $repo
     * @return Response
     */

    public function index(RecetteRepository $repo)
    {

        $recettes = $repo->findAll();

        return $this->render('salees/salees.html.twig', [
            'controller_name' => 'SaleesController',
            'recettes' => $recettes,

        ]);
    }

    /**
     * @Route("/recettes salées/{id}", name="salees_show")
     * @param RecetteRepository $repo
     * @param $id
     * @return Response
     */

    public function show(RecetteRepository $repo, $id)
    {

        $recette = $repo->find($id);
        return $this->render('salees/show.html.twig', [
            'recette' => $recette
        ]);
    }

}