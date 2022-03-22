<?php

namespace App\Controller;

use App\Entity\Adopter;
use App\Form\AdopterType;
use App\Repository\AdopterRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{
    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    #[Route('/account', name: 'app_account')]
    #[IsGranted('ROLE_ADOPTER')]
    public function index(Request $request, AdopterRepository $adopterRepository, UserPasswordHasherInterface
    $userPasswordHasher): Response
    {
        /** @var Adopter $adopter */
        $adopter = $this->getUser();
        $form = $this->createForm(AdopterType::class, $adopter, [
            'method' => 'POST',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!empty($adopter->getPlainPassword())) {
                $adopter->setPassword(
                    $userPasswordHasher->hashPassword(
                        $adopter,
                        $adopter->getPlainPassword()
                    )
                );
            }
            $adopterRepository->add($adopter);
            $this->addFlash('success', 'Donnée insérée');
            return $this->redirectToRoute('app_account');
        }


        return $this->render('account/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
