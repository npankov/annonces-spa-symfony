<?php

namespace App\Controller\Admin;

use App\Entity\Adopter;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AdopterCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Adopter::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            EmailField::new('email'),
            TextField::new('plainPassword')->onlyOnForms(),
            TextField::new('town'),
            TextField::new('department'),
            TextField::new('firstname'),
            TelephoneField::new('phone'),

        ];
    }
}
