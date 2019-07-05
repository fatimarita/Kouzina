<?php

namespace App\Controller;

use App\Entity\Recette;
use App\Form\SearchType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/search/recette", name="search")
     */
    public function index(Request $request)
    {
        $recette = new Recette();
        $form = $this->createForm(SearchType::class, $recette);

        dump('ici');
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            dump('la');
            $nom =  $this->getDoctrine()
                ->getRepository(Recette::class)
                ->findPeoples($recette);

            dump($recette);
            die();
        }

        return $this->render('salees/show.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
