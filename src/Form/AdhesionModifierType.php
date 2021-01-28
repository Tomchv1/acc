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
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AdhesionModifierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('banque', TextType::class)
            ->add('montantTotal', NumberType::class)
            ->add('montantCb', NumberType::class)
            ->add('montantSepa', NumberType::class)
            ->add('montantAncv', NumberType::class)
            ->add('montantCan', NumberType::class)
            ->add('montantCheque', NumberType::class)
            ->add('montantAutre', NumberType::class)
            ->add('commentaire', TextType::class)
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
