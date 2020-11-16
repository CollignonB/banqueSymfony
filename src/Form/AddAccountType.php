<?php

namespace App\Form;

use App\Entity\Accounts;
use App\Entity\AccountTypes;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class AddAccountType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // EntityType 
        $builder
            ->add('AccountType',EntityType::class, [
                'class' => AccountTypes::class,
                'choice_label' => 'name'
            ])
            ->add('amount')
            ->add('save', SubmitType::class, [
                'label' => 'Enregistrer le compte'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Accounts::class,
        ]);
    }
}