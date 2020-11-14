<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(): Response
    {
        return $this->render('home/home.html.twig');
    }

    /**
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     * @Route("/user", name="app_user")
     */
    public function user(): Response
    {
        return $this->render('home/user.html.twig');
    }
}
