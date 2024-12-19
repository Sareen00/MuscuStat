<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ExerciceRepository;

class ExerciceController extends AbstractController
{
    #[Route('/exercice', name: 'app_exercice')]
    public function index(ExerciceRepository $exerciceRepository): Response
    {

        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $exercices = $exerciceRepository->findAll();
        dump($exercices);
        return $this->render('exercice/index.html.twig', [
            'exercices' => $exercices,
        ]);
    }

    #[Route('/addExercice', name: 'app_add_exercice')]
    public function addExercice(ExerciceRepository $exerciceRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('exercice/gestionExercice/addExercice.html.twig');
    }

    #[Route('/updateExercice/{id}', name: 'app_update_exercice')]
    public function updateExercice(ExerciceRepository $exerciceRepository, int $id): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $exercice = $exerciceRepository->find($id);
        if (!$exercice) {
            throw $this->createNotFoundException('Exercice non trouvé');
        }

        return $this->render('exercice/gestionExercice/updateExercice.html.twig', [
            'exerciceName' => $exercice->getName(),
        ]);
    }

    #[Route('/deleteExercice/{id}', name: 'app_delete_exercice')]
    public function deleteExercice(ExerciceRepository $exerciceRepository, int $id): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $exercice = $exerciceRepository->find($id);
        if (!$exercice) {
            throw $this->createNotFoundException('Exercice non trouvé');
        }

        return $this->render('exercice/gestionExercice/deleteExercice.html.twig', [
            'exerciceName' => $exercice->getName(),
        ]);
    }
}
