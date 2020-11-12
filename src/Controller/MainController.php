<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(): Response
    {
        return $this->render('home/home.html.twig');
    }

    // ATTENTION ! route fictive en attendant la réaction du login 
    /**
     * @Route("/login", name="app_login")
     */
    public function login(): Response
    {
        return $this->render('home/login.html.twig');
    }
}
