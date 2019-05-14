<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
        return $this->render('pages/salees.html.twig');
    }
}