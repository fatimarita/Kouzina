<?php

namespace App\Controller;

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
}

