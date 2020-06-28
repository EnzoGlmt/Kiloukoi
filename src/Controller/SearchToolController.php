<?php

namespace App\Controller;

use App\Form\SearchToolType;
use App\Repository\OutilsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SearchToolController extends AbstractController

{

    /**     
     * @Route("/search/tool", name="search_tool", methods={"GET","POST"}) 
     */   

    public function index(Request $request, OutilsRepository $outilsRepository): Response
    {
        //dd($request);
        //dd($request->request);

        if ($request->request->count() > 0) {

           // dd($request->request->get("search_tool"));
            $search_tool = $request->request->get("search_tool");
            // $search_tool["outil"] . "<br>";
           //  $search_tool["categorie"] . "<br>";
            // $search_tool["lieu"] . "<br>";

            $searchOutils = $outilsRepository ->findAllSameTool($search_tool["outil"]);
            return $this->render('search_tool/resultats.html.twig', ['searchOutils' => $searchOutils]);
        
           


            // bref pour récupérer tes données et faire une recherche dans ta base :
            // if ($search_tool["categorie"] !== "") -> $outilrepository find outils where categorie === $search_tool["categorie"]
            //$results = le retour de ta requete custom dans le OutilsRepository            
            // ensuite tu renvoies tout ça vers une nouvelle vue genre :            
            //return $this->render('search_tool/result.html.twig', [                
                //'results' => $results            //]);       
            
            } else {
            $form = $this->createForm(SearchToolType::class);
            $form->handleRequest($request);
            return $this->render('search_tool/index.html.twig', ['form' => $form->createView()]);
        }
    }
}
