<?php

namespace App\Controller;

use App\Entity\Recette;
use App\Repository\RecetteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SucreesController extends AbstractController
{
    /**
     * @Route("/recettes sucrées", name="sucrees")
     * @param RecetteRepository $repo
     * @return Response
     */

    public function index(RecetteRepository $repo)
    {

        $recettes = $repo->findAll();

        return $this->render('sucrees/sucrees.html.twig', [
            'controller_name' => 'SucreesController',
            'recettes' => $recettes,

        ]);
    }

    /**
     * @Route("/recettes sucrées/{id}", name="sucrees_show")
     * @param RecetteRepository $repo
     * @param $id
     * @return Response
     */

    public function show(RecetteRepository $repo, $id)
    {

        $recette = $repo->find($id);
        return $this->render('sucrees/show.html.twig', [
            'recette' => $recette
        ]);
    }

}

