<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class IndexController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function home(): Response
    {
        return $this->render('index/home.html.twig',[
        'controller_name' => 'IndexController',
        ] 
    );
    }
    #[Route('/insert', name: 'app_insert')]
    public function insert(): Response
    {
        return $this->render('index/insert.html.twig');
    }
    #[Route('/login', name: 'app_login')]
    public function login(): Response
    {
        return $this->render('index/login.html.twig');
    }
    #[Route('/register', name: 'app_register')]
    public function register(): Response
    {
        return $this->render('index/register.html.twig');
    }
    #[Route('/task', name: 'app_task')]
    public function task(): Response
    {
        return $this->render('index/task.html.twig');
    }
}
