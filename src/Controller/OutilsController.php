<?php

namespace App\Controller;

use App\Entity\Outils;
use App\Form\OutilsType;
use App\Repository\CategoriesRepository;
use App\Repository\OutilsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/outils")
 */
class OutilsController extends AbstractController
{
    /**
     * @Route("/", name="outils_index", methods={"GET"})
     */
    public function index(OutilsRepository $outilsRepository): Response
    {
        return $this->render('outils/index.html.twig', [
            'outils' => $outilsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="outils_new", methods={"GET","POST"})
     */
    public function new(Request $request,CategoriesRepository $categoriesRepository): Response
    {
        // Attention il manquait une option "mapped"=>false dans le OutilsType pour catégories
        $outil = new Outils();
        $form = $this->createForm(OutilsType::class, $outil);
        // condition légérement modifiée mais 
        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            //je récupère séparémment la catégorie de l'outil(son id en int)
            $data = $request->request->get('outils')["categories"];
            // j'utilise le repository de catégories pour récupérer
            $cat = $categoriesRepository->findOneById($data);
            // pour addCategory cf l'entity Outil methode générée par symfony grace au manytomany avec Cat
            $outil->addCategory($cat);
            // pour finir on flush le nouvel outil dans la table
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($outil);
            $entityManager->flush();

            return $this->redirectToRoute('outils_index');
        }
        
        return $this->render('outils/new.html.twig', [
            'outil' => $outil,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="outils_show", methods={"GET"})
     */
    public function show(Outils $outil): Response
    {
        return $this->render('outils/show.html.twig', [
            'outil' => $outil,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="outils_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Outils $outil): Response
    {
        $form = $this->createForm(OutilsType::class, $outil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('outils_index');
        }

        return $this->render('outils/edit.html.twig', [
            'outil' => $outil,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="outils_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Outils $outil): Response
    {
        if ($this->isCsrfTokenValid('delete'.$outil->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($outil);
            $entityManager->flush();
        }

        return $this->redirectToRoute('outils_index');
    }
}
