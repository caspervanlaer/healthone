<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Category;

class BezoekerController extends AbstractController
{
    /**
     * @Route("/bezoeker", name="bezoeker")
     */
    public function index(): Response
    {
        return $this->render('bezoeker/index.html.twig', [
            'controller_name' => 'BezoekerController',
        ]);
    }

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
       return $this->render('bezoeker/index.html.twig');
    }

    /**
     * @Route("/categories", name="categories")
     */
    public function categoriesAction()
    {

        $categories=$this->getDoctrine()
            ->getRepository(Category::class)
            ->findAll();

       return $this->render('bezoeker/categories.html.twig',['categories'=>$categories]);
    }

    /**
     * @Route("/category/{id}", name="category")
     */
    public function categoryAction($id)
    {

        $category=$this->getDoctrine()
            ->getRepository(Category::class)
            ->find($id);

       return $this->render('bezoeker/categories.html.twig',['category'=>$category]);
    }
}
