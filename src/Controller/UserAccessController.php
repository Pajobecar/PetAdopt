<?php

namespace App\Controller;

use App\Entity\Pet;
use App\Form\PetType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PetRepository;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bridge\Doctrine\Form\Type\DoctrineType;

#[Route('/user')]
class UserAccessController extends AbstractController
{
    #[Route('/', name: 'app_user_access')]
    public function index(PetRepository $petRepository): Response
    {
        return $this->render('user_access/index.html.twig', [
            'controller_name' => 'UserAccessController',
            'pets' => $petRepository->findAll(),
        ]);
    }
    #[Route('details/{id}', name: 'app_pet_show', methods: ['GET'])]
    public function show(Pet $pet): Response
    {
        return $this->render('pet/show.html.twig', [
            'pet' => $pet,
        ]);
    }
    #[Route('adopt/{id}', name: 'app_pet_adopt', methods: ['GET'])]
    public function adopt(Pet $pet, PetRepository $pets): Response
    {
        $currentUser = $this->getUser();
        $pet->setAdoptedBz($currentUser);
        $pet->setStatus('Adopted');
        
        $pets->save($pet, true);

        return $this->redirect('/profile');
    }
    #[Route('/adopted', name: 'app_pet_adopted', methods: ['GET'])]
    public function adopted(PetRepository $pet, UserRepository $user, ManagerRegistry $doctrine): Response
    {

        $currentUser = $this->getUser();
        $pets = $pet->findBy(['adoptedBz' => $currentUser]);




                 
        return $this->render('user_crud/index.html.twig', [
            'pets' => $pets,
            
        ]);
        
    }
}
