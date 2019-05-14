<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class SucreesController extends AbstractController
{
    /**
     * @Route("/recettes sucrées", name="sucrees")
     * @return Response
     */

    public function index(): Response
    {
        return $this->render('pages/sucrees.html.twig');
    }
}