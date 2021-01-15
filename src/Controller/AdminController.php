<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Paiement;
use App\Entity\Annee;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    public function listerReglages()
    {
        $paiement = $this->getDoctrine()
        ->getRepository(Paiement::class)
        ->findAll();

        $annee = $this->getDoctrine()
        ->getRepository(Annee::class)
        ->findAll();

         return $this->render('admin/listerReglages.html.twig', [
            'pPaiements' => $paiement, 'pAnnees' => $annee]);  
    }
}
