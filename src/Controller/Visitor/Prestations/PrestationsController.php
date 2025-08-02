<?php

namespace App\Controller\Visitor\Prestations;

use App\Entity\Category;
use App\Repository\PostRepository;
use App\Repository\SettingRepository;
use App\Repository\CategoryRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class PrestationsController extends AbstractController
{
    public function __construct(
        private CategoryRepository $categoryRepository,
        private SettingRepository $settingRepository,
        private PostRepository $postRepository,
        private PaginatorInterface $paginator
    ) {
    }

    #[Route('/prestations', name: 'app_visitor_prestations_index', methods: ['GET'])]
    public function index(Request $request): Response
    {
        $categories = $this->categoryRepository->findAll();
        $settings = $this->settingRepository->findAll();
        $setting = $settings[0];
        $query = $this->postRepository->findBy(['isPublished' => true], ['publishedAt' => 'DESC']);

        $posts = $this->paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            3
        );

        return $this->render('pages/visitor/prestations/index.html.twig', [
            'setting' => $setting,
            'categories' => $categories,
            'posts' => $posts,
        ]);
    }

    #[Route('/prestations/articles-filtre-par-categorie/{id<\d+>}/{slug}', name: 'app_visitor_prestations_filter_by_category', methods: ['GET'])]
    public function postsFilterByCategory(Request $request, Category $category): Response
    {
        $query = $this->postRepository->findBy([
            'category' => $category,
            'isPublished' => true
        ], ['publishedAt' => 'DESC']);

        $posts = $this->paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            3
        );

        return $this->render('pages/visitor/prestations/index.html.twig', [
            'categories' => $this->categoryRepository->findAll(),
            'posts' => $posts,
        ]);
    }
}
