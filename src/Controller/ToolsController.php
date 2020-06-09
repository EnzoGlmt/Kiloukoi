<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ToolsController extends AbstractController
{
    /**
     * @Route("/tools", name="tools")
     */
    public function index()
    {
        return $this->render('tools/index.html.twig', [
            'controller_name' => 'ToolsController',
        ]);
    }
}
