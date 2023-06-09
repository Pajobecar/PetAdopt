<?php

namespace App\Controller;

use App\Entity\Pet;
use App\Form\PetType;
use App\Repository\PetRepository;
use App\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/dashboard')]
class PetController extends AbstractController
{
    #[Route('/', name: 'app_pet_index', methods: ['GET'])]
    public function index(PetRepository $petRepository): Response
    {
        return $this->render('pet/index.html.twig', [
            'pets' => $petRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_pet_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PetRepository $petRepository, FileUploader $fileUploader): Response
    {
        $pet = new Pet();
        $form = $this->createForm(PetType::class, $pet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

         

            $image = $form->get('image')->getData();
        if ($image) {
            $imageName = $fileUploader->upload($image);
            $pet->setImage($imageName);
            
        }
        $petRepository->save($pet, true);
            return $this->redirectToRoute('app_pet_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pet/new.html.twig', [
            'pet' => $pet,
            'form' => $form,
        ]);
    }



    #[Route('/{id}/edit', name: 'app_pet_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Pet $pet, PetRepository $petRepository, FileUploader $fileUploader): Response
    {
        $form = $this->createForm(PetType::class, $pet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
          


            $image = $form->get('image')->getData();
            if ($image) {
                $imageName = $fileUploader->upload($image);
                $pet->setImage($imageName);
            }
            $petRepository->save($pet, true);
            return $this->redirectToRoute('app_pet_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pet/edit.html.twig', [
            'pet' => $pet,
            'form' => $form,
        ]);
    }

    #[Route('/delete/{id}', name: 'app_pet_delete', methods: ['GET'])]
    public function delete(Request $request, Pet $pet, PetRepository $petRepository): Response
    {
     //   if ($this->isCsrfTokenValid('delete'.$pet->getId(), $request->request->get('_token'))) {
            $petRepository->remove($pet, true);
       // }

        return $this->redirectToRoute('app_pet_index', [], Response::HTTP_SEE_OTHER);
    }
}
