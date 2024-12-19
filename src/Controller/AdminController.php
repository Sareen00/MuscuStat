<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\UserRepository;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {

        $this->denyAccessUnlessGranted('ROLE_ADMIN');


        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    #[Route('/gestionUtilisateur', name: 'app_gestion_utilisateur')]
    public function gestionUtilisateur(UserRepository $userRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $usernames = $userRepository->findAll();

        return $this->render('admin/gestionUtilisateur.html.twig', [
            'usernames' => $usernames,
        ]);
    }


    #[Route('/updateUtilisateur/{id}', name: 'app_update_utilisateur')]
    public function updateUtilisateur(UserRepository $userRepository, int $id): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $user = $userRepository->find($id);
        if (!$user) {
            throw $this->createNotFoundException('Utilisateur non trouvé');
        }

        return $this->render('admin/gestionUtilisateurs/updateUser.html.twig', [
            'username' => $user->getUsername(),
        ]);
    }

    #[Route('/addUser', name: 'app_create_utilisateur')]
    public function addUser(UserRepository $userRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');


        return $this->render('admin/gestionUtilisateurs/addUser.html.twig');
    }

    #[Route('/deleteUser', name: 'app_delete_utilisateur')]
    public function deleteUser(UserRepository $userRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');


        return $this->render('admin/gestionUtilisateurs/deleteUser.html.twig');
    }

}
