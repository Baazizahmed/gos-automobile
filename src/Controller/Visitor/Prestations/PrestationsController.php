<?php

namespace App\Controller\Visitor\Prestations;

use App\Repository\SettingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PrestationsController extends AbstractController
{
    public function __construct(
        private SettingRepository $settingRepository,
    ) {
    }

    #[Route('/prestations', name: 'app_visitor_prestations_index', methods: ['GET'])]
    public function index(): Response
    {
        $settings = $this->settingRepository->findAll();
        $setting = $settings[0];

        return $this->render('pages/visitor/prestations/index.html.twig', [
            'setting' => $setting,
        ]);
    }
}
