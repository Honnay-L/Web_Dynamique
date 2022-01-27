<?php


namespace App\Search;

use App\Entity\Firstname;
use App\Entity\Origin;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class SearchType extends AbstractType
{
    //formulaire de recherche
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('keyword')
            ->add('origins', EntityType::class, [
                'required' => false,
                'label' => 'Origine',
                'class' => Origin::class,
                'multiple' => false,
                'expanded' => false,
                'attr' => [
                    'placeholder' => 'Cliquez'
                ]
            ])
            ->add('Recherche', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'method' => 'GET',
            'csrf_protection' => false,
            'data_class' => Search::class
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }

}
