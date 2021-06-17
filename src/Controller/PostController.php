<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController home',
        ]);
    }

     


    /**
     * @Route("/post/{id}", name="detailview", methods={"GET"}, requirements={"id"="\d+"})
     */
    
    public function view($id): Response
    {
        return $this->render('post/view.html.twig', [
            'controller_name' => 'PostController view',
        ]);
    }
}
