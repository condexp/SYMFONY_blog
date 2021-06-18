<?php

namespace App\Controller;
use App\Entity\Category;

use App\Form\CategoryType;
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
}
