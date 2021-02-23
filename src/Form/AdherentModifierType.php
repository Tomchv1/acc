<?php

namespace App\Form;

use App\Entity\Adherent;
use App\Entity\Famille;
use App\Entity\Responsable;
use App\Entity\Activites;
use App\Entity\Adhesion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\OptionsResolver\Exception\UndefinedOptionsException;

class AdherentModifierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('genre', ChoiceType::class,  [
                    'label' => 'Genre :',
                    'required' => false,
                    'choices' => array(
                    'Féminin' => 'Féminin',
                    'Masculin' => 'Masculin',
                    'Autre' => 'Autre'),
                    'placeholder' => 'Genre',])
            ->add('nom', TextType::class, ['required' => true, 'constraints' => [new Length(['min' => 1, 'max' => 50])]])
            ->add('prenom', TextType::class, ['required' => true, 'constraints' => [new Length(['min' => 1, 'max' => 50])]])
            ->add('date_naissance', TextType::class, ['required' => true, 'constraints' => [new Length(['min' => 10, 'max' => 10])]])
            ->add('famille', EntityType::class, array('class' => 'App\Entity\Famille', 'choice_label' => 'Libelle'))
            ->add('responsables', EntityType::class, array('class' => 'App\Entity\Responsable', 'multiple' => true, 'by_reference' => false))
            ->add('activites', EntityType::class, array('class' => 'App\Entity\Activites', 'multiple' => true, 'by_reference' => false))
            ->add('adhesion', EntityType::class, array('class' => 'App\Entity\Adhesion', 'choice_label' => 'Id', 'disabled' => true))

            ->add('enregistrer', SubmitType::class, array('label' => 'Modifier'))
        ;
    }

    public function getParent(){
        return AdherentType::class;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Adherent::class,
        ]);
    }
}
