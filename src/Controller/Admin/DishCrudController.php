<?php

namespace App\Controller\Admin;

use App\Entity\Dish;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DishCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Dish::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Plat de la carte')
            ->setEntityLabelInPlural('Plats de la carte')

            ->setPageTitle('index', 'Le Quai Antique - %entity_label_plural%')

            ->setPaginatorPageSize(10)

            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');
    } 

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id', 'ID')
                ->hideOnForm(),
            TextField::new('category', 'Catégorie'),
            TextField::new('title', 'Nom du plat'),
            NumberField::new('price', 'Prix'),
            TextField::new('description', 'Description')
                ->setFormType(CKEditorType::class)
        ];
    }
    
}
