<?php

namespace App\Controller;

use App\Entity\Announcement;
use App\Form\AnnonceType;
use App\Repository\AnnouncementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnnouncerController extends AbstractController
{
    #[Route('/announcer', name: 'app_announcer')]
    #[IsGranted('ROLE_BREEDER')]
    public function index(Request $request, AnnouncementRepository $announcementRepository): Response
    {
        $annonce = new Announcement();
        $annonce->setUsers($this->getUser());
        $form = $this->createForm(AnnonceType::class, $annonce);
        $form->handleRequest($request);
        // dd($form);
        if ($form->isSubmitted() && $form->isValid()) {

            $announcementRepository->add($annonce);
            return $this->redirectToRoute('app_my_announce');
        }

        return $this->render('announcer/index.html.twig', [
            'controller_name' => 'AnnouncerController',
            'form' => $form->createView()
        ]);
    }
}
