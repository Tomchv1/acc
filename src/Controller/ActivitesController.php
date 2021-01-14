<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Activites;

class ActivitesController extends AbstractController
{
    /**
     * @Route("/activites", name="activites")
     */
    public function index(): Response
    {
        return $this->render('activites/index.html.twig', [
            'controller_name' => 'ActivitesController',
        ]);
    }

    public function listerActivites()
    {
        $activites = $this->getDoctrine()
        ->getRepository(Activites::class)
        ->findAll();
         return $this->render('activites/listerActivites.html.twig', [
            'pActivites' => $activites,]);  
    }

    public function consulterActivites($activites_id)
    {
    	$activite = $this->getDoctrine()
        ->getRepository(Activites::class)
        ->find($activites_id);

        return $this->render('activites/consulterActivites.html.twig', ['pActivite' => $activite,]);
    }
}
