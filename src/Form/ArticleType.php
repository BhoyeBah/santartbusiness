<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Categorieblog;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', null, [
                'label' => 'Titre de l\'article',
            ])
            ->add('description', null, [
                'label' => 'Description',
            ])
            ->add('categorie', EntityType::class, [
                'class' => Categorieblog::class,
                'choice_label' => 'name',
                'placeholder' => 'Sélectionnez une catégorie',
                'label' => 'Catégorie',
            ])
            ->add('imageFile', VichFileType::class, [
                'required' => true,
                'label' => 'Image de l\'article',
                'allow_delete' => false, // Optionnel : désactive la suppression de fichiers
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
