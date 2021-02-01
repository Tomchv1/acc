<?php

namespace App\Form;

use App\Entity\Adherent;
use App\Entity\Annee;
use App\Entity\Adhesion;
use App\Entity\Responsable;
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
use Symfony\Component\Validator\Constraints\Email;


class ResponsableModifierType extends AbstractType
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
            ->add('telephone', TextType::class, ['required' => false, 'constraints' => [new Length(['min' => 10, 'max' => 10])]])
            ->add('portable', TextType::class, ['required' => false, 'constraints' => [new Length(['min' => 10, 'max' => 10])]])
            ->add('mail', TextType::class, ['required' => false, 'constraints' => [new Email]])
            ->add('adresse', TextType::class, ['required' => true, 'constraints' => [new Length(['min' => 1, 'max' => 150])]])
            ->add('ville', TextType::class, ['required' => true, 'constraints' => [new Length(['min' => 1, 'max' => 100])]])
            ->add('cp', TextType::class, ['required' => false, 'constraints' => [new Length(['min' => 5, 'max' => 5])]])

            ->add('enregistrer', SubmitType::class, array('label' => 'Modifier'))
        ;
    }

    public function getParent(){
      return ResponsableType::class;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Responsable::class,
        ]);
    }
}
