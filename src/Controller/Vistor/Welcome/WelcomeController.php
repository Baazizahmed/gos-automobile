<?php

namespace App\Controller\Vistor\Welcome;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class WelcomeController extends AbstractController
{
    #[Route('/', name: 'app_vistor_welcome', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('pages/visitor/welcome/index.html.twig');
    }
}
