<?php

namespace App\Controller;
use App\Entity\Outils;
use App\Entity\User;
use App\Entity\Categories;

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
        return $this->render('search_tool/index.html.twig', [
            'controller_name' => 'SearchToolController',
        ]);
    }
}
