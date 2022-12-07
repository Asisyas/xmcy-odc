<?php

namespace App\Form;

use App\Model\Form\CompanyHistoricalQuotesFormTransfer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompanyHistoricalQuotesType extends AbstractType
{
    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', type: EmailType::class, options: [
                'empty_data'    => '',
            ])
            ->add('symbol', TextType::class, [
                'required'  => true,
                'autocomplete'  => true,
                'autocomplete_url'  => '/companies',
                'tom_select_options' => [
                    'create' => false,
                    'maxItems'  => 1,
                    'placeholder'   => 'Example: GO?G*',
                    'hideSelected'  => true,
                ]
            ])
            ->add('dateFrom', type: DateType::class, options: [
                'required'  => true,
                'html5' => false,
                'format'  => 'dd/MM/yyyy',
                'widget' => 'single_text',
                'attr'  => [
                    'class' => 'datepicker',
                ],
            ])
            ->add('dateTo', type: DateType::class, options: [
                'required'  => true,
                'widget' => 'single_text',
                'attr'  => [
                    'class' => 'datepicker',
                ],
                'html5' => false,
                'format'  => 'dd/MM/yyyy',
            ])
            ->add('submit', type: SubmitType::class, options: [
                'row_attr'  => [
                    'class' => 'btn btn-primary btn-lg btn-block'
                ]
            ])
            ->add('reset', type: ResetType::class, options: [
                'row_attr'  => [
                    'class' => 'btn btn-primary btn-lg btn-block'
                ]
            ])
        ;
    }

    /**
     * {@inheritDoc}
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class'      => CompanyHistoricalQuotesFormTransfer::class,

            'csrf_protection' => true,
            'csrf_field_name' => '_token',
        ]);
    }
}
