<?php 

namespace App\Form;

use App\Entity\Contacts;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;

class ContactsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'constraints' => [
                    new Email(),
                ],
                'attr' => [
                    'placeholder' => 'Entrez votre e-mail',
                    'class' => 'fs-3',
                ]
            ])
            ->add('subjects', TextType::class, [
                'label' => 'Sujets',
                'constraints' => [
                    new Length(
                        min: 5,
                        max: 100,
                        minMessage : 'Au moins {{ limit }} caractères autorisés',
                        maxMessage: 'Au plus {{ limit }} caractères autorisés',
                    ),
                ],
                'attr' => [
                    'placeholder' => 'Veuillez entrer le sujet ici',
                    'class' => 'fs-3',
                ]
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Message',
                'constraints' => [
                    new Length(
                        min: 5,
                        max: 255,
                        minMessage : 'Au moins {{ limit }} caractères autorisés',
                        maxMessage: 'Au plus {{ limit }} caractères autorisés',
                    ),
                ],
                'attr' => [
                    'placeholder' => 'Veuillez entrer votre message ici',
                    'class' => 'fs-3',
                    'cols' => 10,
                    'rows' => 10,
                ]
            ])
            ->add('envoyer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contacts::class,
        ]);
    }
}
