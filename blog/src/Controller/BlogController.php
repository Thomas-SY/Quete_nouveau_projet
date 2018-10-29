<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog/{slug<^$|\w(-*\w)*$>}", defaults={"slug": "Article Sans Titre"}, name="show")
     */
    public function show($slug)
    {
        $input = str_replace("-"," ",$slug);
        $showTitre = ucwords($input);
        return $this->render('blog/index.html.twig', ['showTitre' => $showTitre]);
    }
}
