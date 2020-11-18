<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
* Class UsersController
* @package App\Controller
* @Route("/administrateur", name="administrateur_")
*/
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="administrateur")
     */
    public function administrator(): Response
    {
        return $this->render('administrateur/administrateur.html.twig');
    }

    /**
     * @Route("/accueil", name="accueil")
     */
    public function home(): Response
    {
        return $this->render('administrateur/accueil.html.twig');
    }

    /**
     * @Route("/equipe", name="equipe")
     */
    public function teams(): Response
    {
        return $this->render('administrateur/equipe.html.twig');
    }

        /**
     * @Route("/contact", name="contact")
     */
    public function contact(): Response
    {
        return $this->render('administrateur/contact.html.twig');
    }

    /**
     * @Route("/compte-client", name="compte-client")
     */
    public function accountsHowner(): Response
    {
        return $this->render('administrateur/compte-client.html.twig');
    }

    /**
     * @Route("/ouvrir-un-nouveau-compte-client", name="ouvrir-un-nouveau-compte-client")
     */
    public function openNewAccountHowner(): Response
    {
        return $this->render('administrateur/ouvrir-un-nouveau-compte-client.html.twig');
    }

    /**
     * @Route("/identite-client", name="identite-client")
     */
    public function clientIdentity(): Response
    {
        return $this->render('administrateur/identite-client.html.twig');
    }
}
