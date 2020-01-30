<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity;
use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\HttpFoundation\Request;


class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function new(Request $request) {

        $user = new User();
        $user->setEmail('');
        $user->setFirstName('');
        $user->setLastName('');
        $user->setPassword('');

        $form = $this->createFormBuilder($user)
            ->add('email', EmailType::class)
            ->add('firstName', TextType::class)
            ->add('lastName', TextType::class)
            ->add('password', PasswordType::class)
            ->add('save', SubmitType::class, ['label' => 'Ajouter un utiisateur'])
            ->getForm();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                // $form->getData() contient les valeurs soumises
                // Parcontre, la variable originale `$user` sera également mise à jour
                $user = $form->getData();
        
                // Action pour sauvegarder les données dans la base de données
                // Par exemple, si Society est une Doctrine entity, il enregistrera les donnés du formulaire dans la table doctrine!
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();
        
                return $this->redirectToRoute('contact');
            }

            return $this->render('user/new.html.twig', [
                'form' => $form->createView(),
            ]);

    }
}
