<?php

namespace App\Controller\Visitor\Welcome;

use App\Repository\SettingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class WelcomeController extends AbstractController
{
    public function __construct(
        private SettingRepository $settingRepository,
    ) {
    }

    #[Route('/', name: 'app_visitor_welcome', methods: ['GET'])]
    public function index(): Response
    {
        $settings = $this->settingRepository->findAll();
        $setting = $settings[0];

        return $this->render('pages/visitor/welcome/index.html.twig', [
            'setting' => $setting,
        ]);
    }
}
