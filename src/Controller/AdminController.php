<?php

namespace App\Controller;
use App\Entity\Category;
use App\Entity\Post;
use App\Form\CategoryType;
use App\Form\PostType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin_home")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'hellobis',
        ]);
    }

     /**
      * @Route("/category/add", name="category_add")
     */
    public function addCategory(Request $request): Response
    {
    
        $category = new Category();
       
        //dd($category);
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);
       
        if ($form->isSubmitted() && $form->isValid()) {
       // dd($form);
       $em = $this->getDoctrine()->getManager();
        // dd($category);
        $em->persist($category);
        $em->flush();
       
        return $this->redirectToRoute('admin_home');
        
    }
        return $this->render('admin/category/add.html.twig', [
            'form' => $form->createView(),]);
    }

     /**
      * @Route("/post/add", name="post_add")
     */
    public function addPost(Request $request): Response
    {
    
        $post = new Post();
       
        //dd($category);
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);
       
        if ($form->isSubmitted() && $form->isValid()) {
          // init user value par dfault
          //connected
          //Active a false
          
            $post->setUser($this->getUser());
            $post->setActive(false);
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();
            return $this->redirectToRoute('home');
        } 

        return $this->render('admin/post/add.html.twig', [
            'form' => $form->createView(),]);
    }

}
