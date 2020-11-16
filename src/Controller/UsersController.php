<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Entity\Accounts;
use App\Form\AddAccountType;
use Doctrine\DBAL\Types\TextType;

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
    public function new_account(Request $request): Response
    {
        $account = new Accounts();
        $form = $this->createForm(AddAccountType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $account = $form->getData();

            $account->setUser($this->getUser());
            $account->setOpeningDate(new \DateTime());
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($account);

            $entityManager->flush();

            return $this->redirectToRoute("app_user");
        }

        return $this->render('user/new_account.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/user/identity", name="app_identity")
     */
    public function identity(): Response
    {
        return $this->render('user/identity.html.twig');
    }
}
