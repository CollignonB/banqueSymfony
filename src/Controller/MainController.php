<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="app_accueil")
     */
    public function index(): Response
    {
        return $this->render('home/accueil.html.twig');
    }

    /**
     * @Route("/equipe", name="app_equipe")
     */
    public function teams(): Response
    {
        return $this->render('home/equipe.html.twig');
    }

    /**
     * @Route("/estimation", name="app_estimation")
     */
    public function estimate(): Response
    {
        return $this->render('home/estimation.html.twig');
    }

    /**
     * @Route("/simulation", name="app_simulation")
     */
    public function simulation(): Response
    {
        return $this->render('home/simulation.html.twig');
    }

    /**
     * @Route("/assurance", name="app_assurance")
     */
    public function insurance(): Response
    {
        return $this->render('home/assurance.html.twig');
    }

    /**
     * @Route("/actualite", name="app_actualite")
     */
    public function news_letters(): Response
    {
        return $this->render('home/actualite.html.twig');
    }

    /**
     * @Route("/contact", name="app_contact")
     */
    public function contact(): Response
    {
        return $this->render('home/contact.html.twig');
    }
}
