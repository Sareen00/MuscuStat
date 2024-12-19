<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class StatController extends AbstractController
{
    #[Route('/stats', name: 'app_stat')]
    public function index(): Response
    {
        return $this->render('stat/index.html.twig', [
            'controller_name' => 'StatController',
        ]);
    }

    #[Route('/stats/{name}', name: 'app_stat_name')]
    public function seeStats($name): Response
    {
        return $this->render('stat/index.html.twig', [
            'controller_name' => 'StatController',
        ]);
    }
    
}
