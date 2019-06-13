<?php
namespace App\Controller;
use App\Entity\Recette;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ApiRecetteController extends AbstractController
{
    /**
     * @Route("/recette/likes/{id}")
     * @return JsonResponse
     */
    public function incrementLikes($id): JsonResponse
    {
        $repo = $this->getDoctrine()->getRepository(Recette::class);
        $recette = $repo->findOneBy([
            'id' => $id
        ]);
        $likes = $recette->getLikes() + 1;
        $recette->setLikes($likes);
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($recette);
        $manager->flush();
        return $this->json([
            'cpt' => $likes
        ]);
    }
}