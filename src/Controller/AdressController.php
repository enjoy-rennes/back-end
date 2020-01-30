<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity;
use App\Entity\Adress;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

use Symfony\Component\HttpFoundation\Request;

class AdressController extends AbstractController
{
    /**
     * @Route("/adress", name="adress")
     */
    public function new(Request $request) {

        $adress = new Adress();
        $adress->setPostalCode('35000');
        $adress->setStreetNumber('04');
        $adress->setAdress('');
        $adress->setCity('');
        $adress->setCountry('');
        $adress->setName('');

        $form = $this->createFormBuilder($adress)
            ->add('postalCode', NumberType::class)
            ->add('streetNumber', NumberType::class)
            ->add('adress', TextType::class)
            ->add('city', TextType::class)
            ->add('country', TextType::class)
            ->add('name', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Ajouter une adresse '])
            ->getForm();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                // $form->getData() contient les valeurs soumises
                // Parcontre, la variable originale `$user` sera également mise à jour
                $adress = $form->getData();
        
                // Action pour sauvegarder les données dans la base de données
                // Par exemple, si Society est une Doctrine entity, il enregistrera les donnés du formulaire dans la table doctrine!
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($adress);
                $entityManager->flush();
        
                return $this->redirectToRoute('contact');
            }

            return $this->render('adress/new.html.twig', [
                'form' => $form->createView(),
            ]);

    }
}
