<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
* @Route("/admin", name="admin_")
*/
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="admin")
     */
    public function admin(): Response
    {
        return $this->render('admin/admin.html.twig');
    }

    /**
     * @Route("/admin/single", name="app_single")
     */
    public function single(): Response
    {
        return $this->render('admin/single.html.twig');
    }

    /**
     * @Route("/admin/new_account", name="app_new_account")
     */
    public function new_account(): Response
    {
        return $this->render('admin/new_account.html.twig');
    }

    /**
     * @Route("/admin/identity", name="app_identity")
     */
    public function identity(): Response
    {
        return $this->render('admin/identity.html.twig');
    }
}
