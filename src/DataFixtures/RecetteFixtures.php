<?php

namespace App\DataFixtures;

use App\Entity\Recette;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class RecetteFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i <= 10; $i++){
            $recette = new Recette();
            $recette->setTitle("Titre de la recette n°$i")
                -> setContent("<p> Contenu de l'article n°$i</p>")
                -> setImageAlt(" http://placehold.it/350x150")
                -> setImageSrc(" http://placehold.it/350x150")
                -> setImageFile("image")
                ->setCreatedAt(new \DateTime())
                -> setNbViews("10")
                -> setLikes("10");

            $manager->persist($recette);

        }


        $manager->flush();
    }
}