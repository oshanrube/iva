<?php

namespace Acme\TaskBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('userId','hidden')
            //->add('calendarId')
            ->add('task')
            ->add('description')
            ->add('datetime','hidden')
            ->add('location','hidden')
            ->add('lng','hidden')
            ->add('lat','hidden')
        ;
    }

    public function getName()
    {
        return 'acme_taskbundle_tasktype';
    }
}
