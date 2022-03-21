<?php

namespace App\Controller;

use App\Repository\AnnouncementRepository;
use App\Repository\BreederRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_default')]
    public function home(AnnouncementRepository $announcementRepository, BreederRepository $breederRepository): Response
    {
        $announcement = $announcementRepository->findAll();
        $breeders = $breederRepository->findAll();
        return $this->render('default/home.html.twig', [
            'announcements' => $announcement,
            'breeders' => $breeders,
        ]);
    }
}
