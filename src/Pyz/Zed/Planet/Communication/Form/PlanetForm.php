<?php

namespace Pyz\Zed\Planet\Communication\Form;

use Spryker\Zed\Kernel\Communication\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Generated\Shared\Transfer\PlanetTransfer;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\PositiveOrZero;

class PlanetForm extends AbstractType
{
    private const FIELD_NAME = 'name';
    private const FIELD_INTERESTING_FACT = 'interesting_fact';
    private const FIELD_NUMBER_OF_MOONS = 'number_of_moons';

    public const BUTTON_SUBMIT = "Submit";

    /**
     * @return string
     */
    public function getBlockPrefix(): string
    {
        return 'planet';
    }

    /**
     * @param \Symfony\Component\OptionsResolver\OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);
        $resolver->setDefaults([
            'data_class' => PlanetTransfer::class
        ]);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $this->addNameField($builder)->addInterestingFactField($builder)->addNumberOfMoonsField(
            $builder
        )->addSubmitButton($builder);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    private function addNameField(FormBuilderInterface $builder): PlanetForm
    {
        $builder->add(static::FIELD_NAME, TextType::class, [
            'constraints' => [
                new NotBlank(),
                new Length(['max' => 50, 'maxMessage' => 'Planet name maximum length is {{ limit }}'])
            ]
        ]);

        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    private function addInterestingFactField(FormBuilderInterface $builder): PlanetForm
    {
        $builder->add(static::FIELD_INTERESTING_FACT, TextType::class, [
            'constraints' => [
                new NotBlank(),
                new Length(['min' => 15, 'minMessage' => 'Interesting fact minimum length is at least {{ limit }}']),
                new Length(['max' => 255, 'maxMessage' => 'Interesting fact maximum length is {{ limit }}'])
            ]
        ]);

        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    private function addNumberOfMoonsField(FormBuilderInterface $builder): PlanetForm
    {
        $builder->add(static::FIELD_NUMBER_OF_MOONS, TextType::class, [
            'constraints' => [
                new NotBlank(),
                new PositiveOrZero()
            ]
        ]);

        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    private function addSubmitButton(FormBuilderInterface $builder): PlanetForm
    {
        $builder->add(static::BUTTON_SUBMIT, SubmitType::class);
        return $this;
    }

}
