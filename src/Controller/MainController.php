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
     * @Route("/teams", name="app_teams")
     */
    public function teams(): Response
    {
        return $this->render('home/teams.html.twig');
    }

    /**
     * @Route("/estimate", name="app_estimate")
     */
    public function estimate(): Response
    {
        return $this->render('home/estimate.html.twig');
    }

    /**
     * @Route("/simulation", name="app_simulation")
     */
    public function simulation(): Response
    {
        return $this->render('home/simulation.html.twig');
    }

    /**
     * @Route("/insurance", name="app_insurance")
     */
    public function insurance(): Response
    {
        return $this->render('home/insurance.html.twig');
    }

    /**
     * @Route("/news_letters", name="app_news_letters")
     */
    public function news_letters(): Response
    {
        return $this->render('home/news_letters.html.twig');
    }

    /**
     * @Route("/contact", name="app_contact")
     */
    public function contact(): Response
    {
        return $this->render('home/contact.html.twig');
    }
}
