<?php

namespace App\Controller\Admin;

use App\Entity\Breeder;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BreederCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Breeder::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('email'),
            TextField::new('plainPassword')->onlyOnForms(),
            TextField::new('name'),
        ];
    }
}
