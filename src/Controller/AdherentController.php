<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Adherent;

class AdherentController extends AbstractController
{
    /**
     * @Route("/adherent", name="adherent")
     */
    public function index(): Response
    {
        return $this->render('adherent/index.html.twig', [
            'controller_name' => 'AdherentController',
        ]);
    }

    public function listerAdherent()
    {
        $adherents = $this->getDoctrine()
        ->getRepository(Adherent::class)
        ->findAll();
         return $this->render('adherent/listerAdherent.html.twig', [
            'pAdherents' => $adherents,]);  
    }

    public function consulterAdherent($adherent_id)
    {
    	$adherent = $this->getDoctrine()->getRepository(Adherent::class)->find($adherent_id);

        return $this->render('adherent/consulterAdherent.html.twig', ['consulter' => $adherent,]);
    }


}
