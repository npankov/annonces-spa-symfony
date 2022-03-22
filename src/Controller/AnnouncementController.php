<?php

namespace App\Controller;

use App\Repository\AnnouncementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnnouncementController extends AbstractController
{
    #[Route('/announcement', name: 'app_announcement')]
    public function index(AnnouncementRepository $announcementRepo): Response
    {
        $announcements = $announcementRepo->findAll();

        return $this->render('announcement/index.html.twig', [
            'announcements'=> $announcements,
        ]);
    }
}
