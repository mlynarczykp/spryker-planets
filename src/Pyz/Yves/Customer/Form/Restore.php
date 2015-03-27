<?php

namespace Pyz\Yves\Customer\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class Restore extends AbstractType
{
    public function getName()
    {
        return "restoreForm";
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("restore_key", "hidden")
            ->add("password", "password", [
                "label" => "Password"
            ])
            ->add("submit", "submit", [
                "label" => "Restore Password"
            ])
        ;
    }
}