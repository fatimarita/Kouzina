<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SaleesController extends AbstractController
{
    /**
     * @Route("/recettes salées", name="salees")
     * @return Response
     */

    public function index(): Response
    {
        return $this->render('salees/salees.html.twig', [
            'controller_name' => 'SaleesController',
        ]);
    }

    /**
     * @Route("/recettes salées/recette/12", name="salees_show")
     * @return Response
     */

    public function show():Response
    {
        return $this->render('salees/show.html.twig');
    }

}