<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Paiement;
use App\Entity\Annee;
use App\Form\PaiementType;
use App\Form\AnneeType;
use App\Form\PaiementModifierType;
use App\Form\AnneeModifierType;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',]);
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

    public function consulterPaiement($paiement_id)
    {
        $paiement = $this->getDoctrine()
        ->getRepository(Paiement::class)
        ->find($paiement_id);

        return $this->render('admin/consulterPaiement.html.twig', ['pPaiement' => $paiement]);
    }

    public function ajouterPaiement(Request $request)
    {         
        $paiement = new Paiement();
        $form = $this->createForm(PaiementType::class, $paiement);
        $form->handleRequest($request);
             
        if ($form->isSubmitted() && $form->isValid()) 
        {             
            $paiement = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($paiement);
            $entityManager->flush();

            return $this->render('admin/consulterPaiement.html.twig', ['pPaiement' => $paiement,]);
        }
        else
        {
            return $this->render('admin/ajouterPaiement.html.twig', array('form' => $form->createView(),));
        }
    }

    public function modifierPaiement($paiement_id, Request $request){
 
        $paiement = $this->getDoctrine()
        ->getRepository(Paiement::class)
        ->find($paiement_id);
 
        if (!$paiement) {
            throw $this->createNotFoundException('Aucun paiement trouvé avec le numéro '.$paiement_id);
        }
        else
        {
            $form = $this->createForm(PaiementModifierType::class, $paiement);
            $form->handleRequest($request);
 
            if ($form->isSubmitted() && $form->isValid()) {
                 $paiement = $form->getData();
                 $entityManager = $this->getDoctrine()->getManager();
                 $entityManager->persist($paiement);
                 $entityManager->flush();
                 return $this->render('admin/consulterPaiement.html.twig', ['pPaiement' => $paiement,]);
           }
           else{
                return $this->render('admin/ajouterPaiement.html.twig', array('form' => $form->createView(),));
           }
        }
    }
 
    public function consulterAnnee($annee_id)
    {
        $annee = $this->getDoctrine()
        ->getRepository(Annee::class)
        ->find($annee_id);

        return $this->render('admin/consulterAnnee.html.twig', ['pAnnee' => $annee]);
    }

    public function ajouterAnnee(Request $request)
    {         
        $annee = new Annee();
        $form = $this->createForm(AnneeType::class, $annee);
        $form->handleRequest($request);
             
        if ($form->isSubmitted() && $form->isValid()) 
        {             
            $annee = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($annee);
            $entityManager->flush();

            return $this->render('admin/consulterAnnee.html.twig', ['pAnnee' => $annee,]);
        }
        else
        {
            return $this->render('admin/ajouterAnnee.html.twig', array('form' => $form->createView(),));
        }
    }

    public function modifierAnnee($annee_id, Request $request){
 
        $annee = $this->getDoctrine()
        ->getRepository(Annee::class)
        ->find($annee_id);
 
        if (!$annee) {
            throw $this->createNotFoundException('Aucune année trouvé avec le numéro '.$annee_id);
        }
        else
        {
            $form = $this->createForm(AnneeModifierType::class, $annee);
            $form->handleRequest($request);
 
            if ($form->isSubmitted() && $form->isValid()) {
                 $annee = $form->getData();
                 $entityManager = $this->getDoctrine()->getManager();
                 $entityManager->persist($annee);
                 $entityManager->flush();
                 return $this->render('admin/consulterAnnee.html.twig', ['pAnnee' => $annee,]);
           }
           else{
                return $this->render('admin/ajouterAnnee.html.twig', array('form' => $form->createView(),));
           }
        }
    }
}
