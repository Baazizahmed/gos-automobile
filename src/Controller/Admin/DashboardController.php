<?php
namespace App\Controller\Admin;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin')]
final class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_admin_dashboard',methods:['GET'])]
    public function index(): Response
    {
        return $this->render('pages/admin/dashboard/index.html.twig');
    }
}
