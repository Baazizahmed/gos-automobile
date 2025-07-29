<?php

namespace App\Controller\Visitor\Contact;

use App\Repository\SettingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ContactController extends AbstractController
{
    public function __construct(
        private SettingRepository $settingRepository,
    ) {
    }

    #[Route('/contact', name: 'app_visitor_contact')]
    public function index(): Response
    {
        $settings = $this->settingRepository->findAll();
        $setting = $settings[0];

        return $this->render('pages/visitor/contact/index.html.twig', [
            'setting' => $setting,
        ]);
    }
}
