<?php

namespace App\Controller\Visitor\Prestations;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PrestationsController extends AbstractController
{
    #[Route('/prestations', name: 'app_visitor_prestations_index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('pages/visitor/prestations/index.html.twig');
    }
}
