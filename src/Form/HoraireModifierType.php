<?php

namespace App\Form;

use App\Entity\Horaire;
use App\Entity\Activites;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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

class HoraireModifierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('jour', TextType::class, ['required' => true, 'constraints' => [new Length(['min' => 1, 'max' => 15])]])
            ->add('dateDebut', TextType::class, ['required' => true, 'constraints' => [new Length(['min' => 4, 'max' => 5])]])
            ->add('dateFin', TextType::class, ['required' => true, 'constraints' => [new Length(['min' => 4, 'max' => 5])]])
            ->add('activites', EntityType::class, array('class' => 'App\Entity\Activites', 'choice_label' => 'Libelle'))

            ->add('enregistrer', SubmitType::class, array('label' => 'Modifier'))
        ;
    }

    public function getParent(){
        return HoraireType::class;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Horaire::class,
        ]);
    }
}
