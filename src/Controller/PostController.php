<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PostController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(PostRepository $postRepository): Response
    {
       
        $posts = $postRepository->findAll();

       // dd($posts);

        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController home',
            'posts'=>  $posts
        ]);
    }

     


    /**
     *--- @Route("/post/{id}", name="detailview", methods={"GET"}, requirements={"id"="\d+"})
     * @Route("/post/{slug}", name="detailview", methods={"GET"})
     */
    
    public function view(Post $post): Response
    {
        //dd($post);
 
          
        return $this->render('post/view.html.twig', [
            'controller_name' => 'PostController view',
            'post'=>$post

        ]);
 
 
 
    }
 
 
    
}