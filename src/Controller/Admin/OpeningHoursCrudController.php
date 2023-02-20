<?php

namespace App\Controller\Admin;

use App\Entity\OpeningHours;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class OpeningHoursCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return OpeningHours::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Horaire d\'ouverture')
            ->setEntityLabelInPlural('Horaires d\'ouverture')

            ->setPageTitle('index', 'Le Quai Antique - %entity_label_plural%')

            ->setPaginatorPageSize(10); 
    }      
    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id', 'ID')
                ->hideOnForm(),
            DateTimeField::new('startHour', 'Heure d\'ouverture'),
            DateTimeField::new('endHour', 'Heure de fermeture'),
        ];
           
    }
     
}
