<?php

namespace Acme\TaskBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class CalendarType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('enabled')
            ->add('description')
            ->add('ownerId')
            ->add('privacyType')
        ;
    }

    public function getName()
    {
        return 'acme_taskbundle_calendartype';
    }
}
