<?php

namespace App\Controller;

use App\Repository\TasksRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TaskController extends AbstractController
{
    #[Route('/task', name: 'app_task')]
    public function List(TasksRepository $tasksRepository)
    {
        $tasks = $tasksRepository->findAll();

        return $this->render('task/list.html.twig', [
            'tasks' => $tasks
        ]);
    }
}
