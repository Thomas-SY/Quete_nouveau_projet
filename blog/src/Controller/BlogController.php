<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
//    /**
//     * @Route("/blog/{slug<^$|\w(-*\w)*$>}", defaults={"slug": "Article Sans Titre"}, name="show")
//     */
    /*public function show($slug)
    {
        $input = str_replace("-"," ",$slug);
        $showTitre = ucwords($input);
        return $this->render('blog/index.html.twig', ['showTitre' => $showTitre]);
    }*/

    /**
     * @Route("/", name="article_index")
     */
    public function index()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $articlesManager = $entityManager->getRepository(Article::class);

        $articles = $articlesManager->findAll();

        return $this->render('blog/index.html.twig', ['articles' => $articles,]);
    }

}
