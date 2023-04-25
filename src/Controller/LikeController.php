<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


use App\Entity\Pet;
use App\Repository\PetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LikeController extends AbstractController
{
    #[Route('/like/{id}', name: 'app_like')]
    #[isGranted('IS_AUTHENTICATED_FULLY')]
    public function like(Pet $pet, PetRepository $pets, HttpFoundationRequest $request): Response
    {
        $currentUser = $this->getUser();
        $pet->addLikedBy($currentUser);
        
        $pets->save($pet, true);

        $lastUrl = $request->headers->get('referer');
        return $this->redirect($lastUrl);
    }
    #[Route('/unlike/{id}', name: 'app_unlike')]
    #[isGranted('IS_AUTHENTICATED_FULLY')]
    public function unlike(Pet $pet, PetRepository $pets, HttpFoundationRequest $request): Response
    {
        $currentUser = $this->getUser();
        $pet->removeLikedBy($currentUser);
        $pets->save($pet, true);

        $lastUrl = $request->headers->get('referer');
        return $this->redirect($lastUrl);

    }
}
