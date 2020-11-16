<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class UsersController extends AbstractController
{

  /**
     * @Route("/user", name="app_user")
     */
    public function user(): Response
    {
        return $this->render('user/user.html.twig');
    }

    /**
     * @Route("/user/single", name="app_single")
     */
    public function single(): Response
    {
        return $this->render('user/single.html.twig');
    }

    /**
     * @Route("/user/new_account", name="app_new_account")
     */
    public function new_account(): Response
    {
        return $this->render('user/new_account.html.twig');
    }

    /**
     * @Route("/user/identity", name="app_identity")
     */
    public function identity(): Response
    {
        return $this->render('user/identity.html.twig');
    }
}
