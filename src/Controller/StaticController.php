<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PetRepository;

class StaticController extends AbstractController
{
    #[Route('/', name: 'app_static')]
    public function index(PetRepository $petrepo): Response
    {

                $allPets = $petrepo->findAll();
                shuffle($allPets);
                $randomPets = array_slice($allPets, 0, 7);

                return $this->render('static/index.html.twig', [
                    // 'allpets' => $petrepo->findBy([],[],rand((8),(4))),
                    'randomPets' => $randomPets,
                    

        ]);
    }

    #[Route('/about', name: 'app_static_about')]
    public function about(PetRepository $petrepo): Response
    {

                return $this->render('about/index.html.twig', [
                    'allpets' => $petrepo->findBy([],[],9,5),
        ]);
    }

    #[Route('/contact', name: 'app_static_contact')]
    public function contact(PetRepository $petrepo): Response
    {

                return $this->render('contact/contact.html.twig', [
                    'allpets' => $petrepo->findBy([],[],9,5),
        ]);
    }
    #[Route('/home', name: 'app_static_home')]
    public function home(PetRepository $petrepo): Response
    {
        $allPets = $petrepo->findAll();
        shuffle($allPets);
        $randomPets = array_slice($allPets, 0, 7);

        return $this->render('home/index.html.twig', [
            // 'allpets' => $petrepo->findBy([],[],rand((8),(4))),
            'randomPets' => $randomPets,
                    
                
        ]);
}
}
