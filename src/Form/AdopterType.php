<?php

namespace App\Form;

use App\Entity\Adopter;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdopterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email',
                EmailType::class, // On peut lui donner un type (ici, on dit que c'est un input de type text
                [
                    'required' => true, // On passe une option, pour préciser que ce champ est requis (ne doit pas être vide)
                ])
            ->add('plainPassword',
                TextType::class, // On peut lui donner un type (ici, on dit que c'est un input de type text
                [
                    'required' => true, // On passe une option, pour préciser que ce champ est requis (ne doit pas être vide)
                ])
            ->add('town',
                TextType::class, // On peut lui donner un type (ici, on dit que c'est un input de type text
                [
                    'required' => true, // On passe une option, pour préciser que ce champ est requis (ne doit pas être vide)
                ])
            ->add('department',
                TextType::class, // On peut lui donner un type (ici, on dit que c'est un input de type text
                [
                    'required' => true, // On passe une option, pour préciser que ce champ est requis (ne doit pas être vide)
                ])
            ->add('firstName',
                TextType::class, // On peut lui donner un type (ici, on dit que c'est un input de type text
                [
                    'required' => true, // On passe une option, pour préciser que ce champ est requis (ne doit pas être vide)
                ])
            ->add('phone',
                TelType::class, // On peut lui donner un type (ici, on dit que c'est un input de type text
                [
                    'required' => true, // On passe une option, pour préciser que ce champ est requis (ne doit pas être vide)
                ])
            ->add('lastName',
                TextType::class, // On peut lui donner un type (ici, on dit que c'est un input de type text
                [
                    'required' => true, // On passe une option, pour préciser que ce champ est requis (ne doit pas être vide)
                ])
            ->add('submit', SubmitType::class, [
                'label' => 'Valider',
                'attr' => [
                   'class' => 'btn btn-danger mt-3 mt-sm-0'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Adopter::class,
        ]);
    }
}
