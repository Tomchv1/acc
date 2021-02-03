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
use App\Entity\Annee;
use App\Form\AdherentType;
use App\Form\AdherentModifierType;
use App\Form\AdhesionType;
use App\Form\AdhesionModifierType;
use App\Form\ResponsableType;
use App\Form\ResponsableModifierType;
use App\Form\FamilleType;

class AdherentController extends AbstractController
{
    public function index(): Response
    {
        exec("php /my/project/app/console cache:clear --env=prod");

        return $this->render('adherent/index.html.twig', [
            'controller_name' => 'AdherentController',]);
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

    public function modifierAdherent($adherent_id, Request $request){
 
        $adherent = $this->getDoctrine()
        ->getRepository(Adherent::class)
        ->find($adherent_id);
 
        if (!$adherent) {
            throw $this->createNotFoundException('Aucun adhérent trouvé avec le numéro '.$adherent_id);
        }
        else
        {
            $form = $this->createForm(AdherentModifierType::class, $adherent);
            $form->handleRequest($request);
 
            if ($form->isSubmitted() && $form->isValid()) {
                 $adherent = $form->getData();
                 $entityManager = $this->getDoctrine()->getManager();
                 $entityManager->persist($adherent);
                 $entityManager->flush();
                 return $this->render('adherent/consulterAdherent.html.twig', ['pAdherent' => $adherent,]);
           }
           else{
                return $this->render('adherent/ajouterAdherent.html.twig', array('form' => $form->createView(),));
           }
        }
    }

    public function supprimerAdherent(Request $request, Adherent $adherent_id)
    {
        $em = $this->getDoctrine()->getManager();
        
        $em->remove($adherent_id);
        $em->flush();

        return $this->redirectToRoute('liste-adherent');
    }


    public function ajouterAdhesion(Request $request)
    {         
        $adhesion = new Adhesion();
        $form = $this->createForm(AdhesionType::class, $adhesion);
        $form->handleRequest($request);
             
        if ($form->isSubmitted() && $form->isValid()) 
        {  
            $adhesion = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($adhesion);
            $entityManager->flush();

            return $this->render('adherent/consulterAdhesion.html.twig', ['pAdhesion' => $adhesion,]);
        }
        else
        {
            return $this->render('adherent/ajouterAdhesion.html.twig', array('form' => $form->createView(),));
        }
    }

    public function modifierAdhesion($adhesion_id, Request $request){
 
        $adhesion = $this->getDoctrine()
        ->getRepository(Adhesion::class)
        ->find($adhesion_id);
 
        if (!$adhesion) {
            throw $this->createNotFoundException('Aucune adhésion trouvée avec le numéro '.$adhesion_id);
        }
        else
        {
            $form = $this->createForm(AdhesionModifierType::class, $adhesion);
            $form->handleRequest($request);
 
            if ($form->isSubmitted() && $form->isValid()) {
                 $adhesion = $form->getData();
                 $entityManager = $this->getDoctrine()->getManager();
                 $entityManager->persist($adhesion);
                 $entityManager->flush();
                 return $this->render('adherent/consulterAdhesion.html.twig', ['pAdhesion' => $adhesion,]);
           }
           else{
                return $this->render('adherent/ajouterAdhesion.html.twig', array('form' => $form->createView(),));
           }
        }
    }

    public function consulterResponsable($responsable_id)
    {
        $responsable = $this->getDoctrine()
        ->getRepository(Responsable::class)
        ->find($responsable_id);

        return $this->render('adherent/consulterResponsable.html.twig', ['pResponsable' => $responsable]);
    }

    public function listerResponsable()
    {
        $responsable = $this->getDoctrine()
        ->getRepository(Responsable::class)
        ->findAll();
         return $this->render('adherent/listerResponsable.html.twig', [
            'pResponsable' => $responsable,]);  
    }


    public function ajouterResponsable(Request $request)
    {         
        $responsable = new Responsable();
        $form = $this->createForm(ResponsableType::class, $responsable);
        $form->handleRequest($request);
             
        if ($form->isSubmitted() && $form->isValid()) 
        {
            $responsable = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($responsable);
            $entityManager->flush();

            return $this->render('adherent/consulterResponsable.html.twig', ['pResponsable' => $responsable,]);
        }
        else
        {
            return $this->render('adherent/ajouterResponsable.html.twig', array('form' => $form->createView(),));
        }
    }

    public function modifierResponsable($responsable_id, Request $request){
 
        $responsable = $this->getDoctrine()
        ->getRepository(Responsable::class)
        ->find($responsable_id);
 
        if (!$responsable) {
            throw $this->createNotFoundException('Aucun responsable trouvé avec le numéro '.$responsable_id);
        }
        else
        {
            $form = $this->createForm(ResponsableModifierType::class, $responsable);
            $form->handleRequest($request);
 
            if ($form->isSubmitted() && $form->isValid()) {
                 $responsable = $form->getData();
                 $entityManager = $this->getDoctrine()->getManager();
                 $entityManager->persist($responsable);
                 $entityManager->flush();
                 return $this->render('adherent/consulterResponsable.html.twig', ['pResponsable' => $responsable,]);
           }
           else{
                return $this->render('adherent/ajouterResponsable.html.twig', array('form' => $form->createView(),));
           }
        }
    }

    public function supprimerResponsable(Request $request, Responsable $responsable_id)
    {
        $em = $this->getDoctrine()->getManager();
        
        $em->remove($responsable_id);
        $em->flush();

        return $this->redirectToRoute('liste-responsable');
    }


    public function ajouterFamille(Request $request)
    {         
        $famille = new Famille();
        $form = $this->createForm(FamilleType::class, $famille);
        $form->handleRequest($request);
             
        if ($form->isSubmitted() && $form->isValid()) 
        {
            $famille = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($famille);
            $entityManager->flush();

            return $this->render('adherent/consulterFamille.html.twig', ['pFamille' => $famille,]);
        }
        else
        {
            return $this->render('adherent/ajouterFamille.html.twig', array('form' => $form->createView(),));
        }
    }
}
