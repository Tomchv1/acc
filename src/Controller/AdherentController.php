<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Adherent;
use App\Entity\Responsable;
use App\Entity\Activites;
use App\Entity\Famille;
use App\Entity\Adhesion;
use App\Form\AdherentType;

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
    	$adherent = $this->getDoctrine()
        ->getRepository(Adherent::class)
        ->find($adherent_id);

        return $this->render('adherent/consulterAdherent.html.twig', ['pAdherent' => $adherent]);
    }


    public function ajouterAdherent(Request $request)
    {         
        $adherent = new Adherent();
        $form = $this->createForm(AdherentType::class, $adherent);
        $form->handleRequest($request);
             
        if ($form->isSubmitted() && $form->isValid()) 
        {
             
                $adherent = $form->getData();
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($adherent);
                $entityManager->flush();

             
                return $this->render('adherent/consulterAdherent.html.twig', ['pAdherent' => $adherent,]);
        }
        else
        {
            return $this->render('adherent/ajouterAdherent.html.twig', array('form' => $form->createView(),));
        }

    }
}
