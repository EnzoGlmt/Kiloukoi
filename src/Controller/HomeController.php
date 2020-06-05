<?php

namespace App\Controller;


use App\Repository\OutilsRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(OutilsRepository $outilRepository)
    {

        return $this->render('home/index.html.twig', [
            'outils' => '$outils',
        ]);
    }
}
