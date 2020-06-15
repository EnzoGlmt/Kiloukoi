<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SearchToolController extends AbstractController
{
    /**
     * @Route("/search/tool", name="search_tool")
     */
    public function index()
    {
        return $this->render('search_tool/index.html.twig', [
            'controller_name' => 'SearchToolController',
        ]);
    }
}
