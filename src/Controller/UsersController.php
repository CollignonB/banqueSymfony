<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Entity\Accounts;
use App\Entity\AccountTypes;
use App\Entity\Users;
use App\Form\AddAccountType;
use Doctrine\DBAL\Types\TextType;

/**
 * Class UsersController
 * @package App\Controller
 * @Route("/particulier", name="particulier_")
 */
class UsersController extends AbstractController
{

  /**
     * @Route("/mon-espace", name="mon-espace")
     */
    public function user(): Response
    {
        // $accountType->setUser($this->getUser());
        // $accountType->setOpeningDate(new \DateTime());
        // $entityManager = $this->getDoctrine()->getManager();
        // $entityManager->persist($accountType);

        // $entityManager->flush();

        return $this->render('particulier/mon-espace.html.twig');
    }

    /**
     * @Route("/mon-compte", name="mon-compte")
     */
    public function myAccount(): Response
    {
        return $this->render('particulier/mon-compte.html.twig');
    }

    /**
     * @Route("/ajouter-un-compte", name="ajouter-un-compte")
     */
    public function addAccount(Request $request): Response
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

            return $this->redirectToRoute("mon-espace");
        }

        return $this->render('particulier/ajouter-un-compte.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/mon-identite", name="mon-identite")
     */
    public function myIdentity(): Response
    {
        return $this->render('particulier/mon-identite.html.twig');
    }
}
