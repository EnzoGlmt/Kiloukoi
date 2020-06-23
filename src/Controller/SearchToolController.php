<?php

namespace App\Controller;


use App\Form\SearchToolType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
class SearchToolController extends AbstractController

{

    /**

     * @Route("/search/tool", name="search_tool")

     */

    public function index(Request $request): Response

    {   

       $form = $this-> createForm (SearchToolType::class);

       $form ->handleRequest($request);

       

        return $this->render('search_tool/index.html.twig', [

            'form' => $form -> createView()

        ]);

    }

}


