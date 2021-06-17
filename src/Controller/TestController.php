<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index(): Response
    {
        return $this->render('test/index.html.twig',
         [
            'controller_name' => 'Controller : Test ',
            'test1' => 'Controller : Test2',
            'test2' => 'Controller : Test ',
            'test3' => 'Controller : Test ',
         ]
    
    
    
    );
    }



/**
 * @Route("/test/{id}", name="test_id", methods={"GET"}, requirements={"id"="\d+"})
 */

public function test_id($id):Response

{
       // dd($id);
       // var_dump ($id);

    return $this->render('test/index.html.twig',
     [
        'controller_name' => 'Controller : Test1 id',
        'test1' => 'Controller : Test  id ',
        'test2' => 'Controller : Test ',
        'test3' => 'Controller : Test ',
        'id' => $id,
     ]



);
}










}




