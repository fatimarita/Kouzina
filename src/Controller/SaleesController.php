<?php

namespace App\Controller;

use App\Entity\Recette;
use App\Entity\Comment;
use App\Repository\RecetteRepository;
use App\Form\CommentFrontType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
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
     * @param Request $request
     * @return Response
     *
     */

    public function show(Recette $recette, $id, Request $request)
    {
// Création du formulaire pour l'ajout de commentaire

        /** @var $recette */

        $commentForm = $this->createFormComment($recette);



        // Gestion de l'ajout d'un commentaire
        $commentForm->handleRequest($request);
        if ($commentForm->isSubmitted() && $commentForm->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($commentForm->getData());
            $manager->flush();
            $commentForm = $this->createFormComment($recette);

        }

        return $this->render('salees/show.html.twig', [
            'recette' => $recette,
            'commentForm' => $commentForm->createView()
        ]);
    }

    /**
     * @param Recette $recette
     * @return \Symfony\Component\Form\FormInterface
     */
    private function createFormComment(Recette $recette)
    {
        // Création d'un nouveau formulaire
        $comment = new Comment();
        $comment->setRecette($recette);
        return $this->createForm(CommentFrontType::class, $comment);
    }
    /**
     * @Route("/api/recette/likes/{id}")
     * @return JsonResponse
     */
    public function incrementLikes($id): JsonResponse
    {
        $repo = $this->getDoctrine()->getRepository(Recette::class);
        $recette = $repo->findOneBy([
            'id' => $id
        ]);

        $liks = $recette->getLikes() + 1;

        /** @var TYPE_NAME $likes */
        $recette->setLikes($likes);
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($recette);
        $manager->flush();
        return $this->json([
            'cpt' => $likes
        ]);
    }

}

