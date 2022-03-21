<?php

namespace App\Controller;

use App\Entity\Breeder;
use App\Form\BreederUpdateFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class BreederController extends AbstractController
{
    #[Route('/breeder', name: 'app_breeder')]
    #[IsGranted('ROLE_BREEDER')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $breeder = $this->getUser();
        $form = $this->createForm(BreederUpdateFormType::class, $breeder);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($breeder);
            $em->flush();
            $this->addFlash('success', 'Donnée insérée');

            return $this->redirectToRoute('app_breeder');
        }
        return $this->render('breeder/breeder.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
