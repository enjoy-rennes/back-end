<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity;
use App\Entity\Condition;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\HttpFoundation\Request;

class ConditionController extends AbstractController
{
    /**
     * @Route("/condition", name="condition")
     */
    public function new(Request $request) {

        $condition = new Condition();
        
        $condition->setName('');
        $condition->setOperator('');
        $condition->setType('');
        $condition->setValue('');

        $form = $this->createFormBuilder($condition)
            
            ->add('name', TextType::class)
            ->add('operator', TextType::class)
            ->add('type', TextType::class)
            ->add('value', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Ajouter une condtion'])
            ->getForm();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                // $form->getData() contient les valeurs soumises
                // Parcontre, la variable originale `$user` sera également mise à jour
                $condition = $form->getData();
        
                // Action pour sauvegarder les données dans la base de données
                // Par exemple, si Society est une Doctrine entity, il enregistrera les donnés du formulaire dans la table doctrine!
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($condition);
                $entityManager->flush();
        
                return $this->redirectToRoute('contact');
            }

            return $this->render('condition/new.html.twig', [
                'form' => $form->createView(),
            ]);

    }
}
