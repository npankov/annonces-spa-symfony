<?php

namespace App\Controller;

use App\Repository\AnnouncementRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MyAnnounceController extends AbstractController
{
    #[Route('/my/announce', name: 'app_my_announce')]
    #[IsGranted('ROLE_BREEDER')]
    public function index(AnnouncementRepository $announcementRepository): Response
    {
        $announcements = $announcementRepository->findBy([
            'users' => $this->getUser(),
        ]);
        return $this->render('my_announce/index.html.twig', [
            'announcements' => $announcements,
        ]);
    }
}
