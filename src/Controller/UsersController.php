<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Entity\Accounts;
use App\Repository\AccountsRepository;
use App\Entity\Users;
use App\Form\AddAccountType;



/**
 * Class UsersController
 * @package App\Controller
 * @param AccountsRepository $AccountsRepository
 * @return Response
 * @Route("/particulier", name="particulier_")
 */
class UsersController extends AbstractController
{

    /**
     * @Route("/mon-espace", name="mon-espace")
     */
    public function user()
    {
        return $this->render('particulier/mon-espace.html.twig');
    }

    /**
     * @Route("/mon-compte/{id}", name="mon-compte", requirements={"id"="\d+"})
     */
    public function myAccount(int $id)
    {
        $AccountsRepository = $this->getDoctrine()->getRepository(Accounts::class);
        
        $account = $AccountsRepository->find($id);

        return $this->render('particulier/mon-compte.html.twig', [
            'account' => $account,
        ]);
    }

    /**
     * @Route("/ajouter-un-compte", name="ajouter-un-compte")
     */
    public function addAccount(Request $request)
    {
        $account = new Accounts();
        $form = $this->createForm(AddAccountType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $account = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $account->setUser($this->getUser());
            $account->setOpeningDate(new \DateTime());
            $entityManager->persist($account);

            $entityManager->flush();

            return $this->redirectToRoute('particulier_mon-espace');
        }

        return $this->render('particulier/ajouter-un-compte.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/mon-identite", name="mon-identite")
     */
    public function myIdentity()
    {
        return $this->render('particulier/mon-identite.html.twig');
    }
}
