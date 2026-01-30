<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DashboardController extends AbstractController
{
    private function noCache(Response $response): Response
    {
        $response->headers->set('Cache-Control', 'no-cache, no-store, must-revalidate');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', '0');
        return $response;
    }

    #[Route('/', name: 'app_dashboard')]
    public function index(): Response
    {
        return $this->noCache($this->render('dashboard/index.html.twig'));
    }

    #[Route('/admin', name: 'app_admin_dashboard')]
    public function admin(): Response
    {
        return $this->noCache($this->render('dashboard/admin.html.twig'));
    }
}
