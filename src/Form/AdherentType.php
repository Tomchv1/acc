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


class AdherentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class)
            ->add('prenom', TextType::class)
            ->add('date_naissance', TextType::class)
            ->add('famille', EntityType::class, array('class' => 'App\Entity\Famille', 'choice_label' => 'Libelle'))
            ->add($builder->create('responsables', FormType::class, ['by_reference' => false])
                ->add('responsables', EntityType::class, array('class' => 'App\Entity\Responsable', 'choice_label' => 'Id')))
            ->add($builder->create('activites', FormType::class, ['by_reference' => false])
                ->add('activites', EntityType::class, array('class' => 'App\Entity\Activites', 'choice_label' => 'Id')))
            ->add('adhesion', EntityType::class, array('class' => 'App\Entity\Adhesion', 'choice_label' => 'Id'))

            ->add('enregistrer', SubmitType::class, array('label' => 'Ajouter'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Adherent::class,
        ]);
    }
}
