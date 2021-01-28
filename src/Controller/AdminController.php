<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Annee;
use App\Form\AnneeType;
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
        $annee = $this->getDoctrine()
        ->getRepository(Annee::class)
        ->findAll();

         return $this->render('admin/listerReglages.html.twig', ['pAnnees' => $annee]);  
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

    public function supprimerAnnee(Request $request, Annee $annee_id)
    {
        $em = $this->getDoctrine()->getManager();
        
        $em->remove($annee_id);
        $em->flush();

        return $this->redirectToRoute('reglages');
    }
}
