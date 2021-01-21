<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Activites;
use App\Entity\Horaire;
use App\Form\HoraireType;
use App\Form\ActivitesType;

class ActivitesController extends AbstractController
{
    /**
     * @Route("/activites", name="activites")
     */
    public function index(): Response
    {
        return $this->render('activites/index.html.twig', [
            'controller_name' => 'ActivitesController',]);
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

    public function ajouterActivites(Request $request)
    {         
        $activites = new Activites();
        $form = $this->createForm(ActivitesType::class, $activites);
        $form->handleRequest($request);
             
        if ($form->isSubmitted() && $form->isValid()) 
        {
            $activite = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($activites);
            $entityManager->flush();

            return $this->render('activites/consulterActivites.html.twig', ['pActivite' => $activite,]);
        }
        else
        {
            return $this->render('activites/ajouterActivites.html.twig', array('form' => $form->createView(),));
        }
    }

    public function ajouterHoraire(Request $request)
    {         
        $horaire = new Horaire();
        $form = $this->createForm(HoraireType::class, $horaire);
        $form->handleRequest($request);
             
        if ($form->isSubmitted() && $form->isValid()) 
        {
            $horaire = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($horaire);
            $entityManager->flush();

            $activites = $this->getDoctrine()
            ->getRepository(Activites::class)
            ->findAll();
            
            return $this->render('activites/listerActivites.html.twig', [
            'pActivites' => $activites,]); 

        }
        else
        {
            return $this->render('activites/ajouterHoraire.html.twig', array('form' => $form->createView(),));
        }
    }
}
