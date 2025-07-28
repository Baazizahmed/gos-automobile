<?php

namespace App\Controller\Admin\Post;

use App\Entity\Post;
use App\Entity\User;
use App\Form\AdminPostFormType;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin')]
final class PostController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private CategoryRepository $categoryRepository,
    ) {
    }

    #[Route('/post/index', name: 'app_admin_post_index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('pages/admin/post/index.html.twig');
    }

    #[Route('/post/create', name: 'app_admin_post_create', methods: ['GET', 'POST'])]
    public function create(Request $request): Response
    {
        if (0 == count($this->categoryRepository->findAll())) {
            $this->addFlash('warning', 'Pour créer un nouvel article, vous devez créer au moins une catégorie.');

            return $this->redirectToRoute('app_admin_category_index');
        }

        $post = new Post();

        $form = $this->createForm(AdminPostFormType::class, $post);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /**
             * @var User
             */
            $user = $this->getUser();

            $post->setUser($user);
            $post->setCreatedAt(new \DateTimeImmutable());
            $post->setUpdatedAt(new \DateTimeImmutable());

            $this->entityManager->persist($post);
            $this->entityManager->flush();

            $this->addFlash('success', "L'article a été créé et sauvegardé.");

            return $this->redirectToRoute('app_admin_post_index');
        }

        return $this->render('pages/admin/post/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
