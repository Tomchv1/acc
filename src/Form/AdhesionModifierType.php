<?php

namespace App\Form;

use App\Entity\Adherent;
use App\Entity\Annee;
use App\Entity\Adhesion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Constraints\Length;

class AdhesionModifierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('banque', TextType::class, ['required' => false, 'constraints' => [new Length(['min' => 0, 'max' => 60])]])
            ->add('montantTotal', NumberType::class, ['required' => true, 'constraints' => [new Length(['min' => 1])]])
            ->add('montantCb', NumberType::class, ['required' => false, 'constraints' => [new Length(['min' => 0])]])
            ->add('montantSepa', NumberType::class, ['required' => false, 'constraints' => [new Length(['min' => 0])]])
            ->add('montantAncv', NumberType::class, ['required' => false, 'constraints' => [new Length(['min' => 0])]])
            ->add('montantCan', NumberType::class, ['required' => false, 'constraints' => [new Length(['min' => 0])]])
            ->add('montantCheque', NumberType::class, ['required' => false, 'constraints' => [new Length(['min' => 0])]])
            ->add('montantEspece', NumberType::class, ['required' => false, 'constraints' => [new Length(['min' => 0])]])
            ->add('commentaire', TextareaType::class, ['required' => false, 'constraints' => [new Length(['min' => 0, 'max' => 500])]])
            ->add('annee', EntityType::class, array('class' => 'App\Entity\Annee', 'choice_label' => 'Libelle'))

            ->add('enregistrer', SubmitType::class, array('label' => 'Modifier'))
        ;
    }

    public function getParent(){
        return AdhesionType::class;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Adhesion::class,
        ]);
    }
}
