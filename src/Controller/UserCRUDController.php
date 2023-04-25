<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\User1Type;
use App\Repository\PetRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\FileUploader;


#[Route('/profile')]
class UserCRUDController extends AbstractController
{
    #[Route('/', name: 'app_user_c_r_u_d_index', methods: ['POST', 'GET'])]
    public function index(UserRepository $userRepository, PetRepository $pet): Response
    {
        $currentUser = $this->getUser();
        $pets = $pet->findBy(['adoptedBz' => $currentUser]);




           
        return $this->render('user_crud/index.html.twig', [
            'users' => $userRepository->findAll(),
            'pets' => $pets
        ]);
    }

    #[Route('/new', name: 'app_user_c_r_u_d_new', methods: ['GET', 'POST'])]
    public function new(Request $request, UserRepository $userRepository): Response
    {
        $user = new User();
        $form = $this->createForm(User1Type::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userRepository->save($user, true);

            return $this->redirectToRoute('app_user_c_r_u_d_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user_crud/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_user_c_r_u_d_show', methods: ['GET'])]
    public function show(User $user): Response
    {
        return $this->render('user_crud/show.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/edit/{id}', name: 'app_user_crud_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, User $user, UserRepository $userRepository, FileUploader $fileUploader): Response
    {
        
        $form = $this->createForm(User1Type::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $image = $form->get('image')->getData();
            if ($image) {
                $imageName = $fileUploader->upload($image);
                $user->setImage($imageName);
            }
            $userRepository->save($user, true);


            return $this->redirectToRoute('app_user_c_r_u_d_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user_crud/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/delete/{id}', name: 'app_user_c_r_u_d_delete', methods: ['GET','POST'])]
    public function delete(Request $request, User $user, UserRepository $userRepository): Response
    {
        
            $userRepository->remove($user, true);
        

        return $this->redirectToRoute('app_static', [], Response::HTTP_SEE_OTHER);
    }
}
