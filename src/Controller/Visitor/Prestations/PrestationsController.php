<?php

namespace App\Controller\Visitor\Prestations;

use App\Repository\CategoryRepository;
use App\Repository\PostRepository;
use App\Repository\SettingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PrestationsController extends AbstractController
{
    public function __construct(
        private CategoryRepository $categoryRepository,
        private SettingRepository $settingRepository,
        private PostRepository $postRepository,
    ) {
    }

    #[Route('/prestations', name: 'app_visitor_prestations_index', methods: ['GET'])]
    public function index(): Response
    {
        $categories = $this->categoryRepository->findAll();
        $settings = $this->settingRepository->findAll();
        $setting = $settings[0];
        $posts = $this->postRepository->findBy(['isPublished' => true], ['publishedAt' => 'DESC']);

        return $this->render('pages/visitor/prestations/index.html.twig', [
            'setting' => $setting,
            'categories' => $categories,
            'posts' => $posts,
        ]);
    }
}
