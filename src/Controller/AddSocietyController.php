<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity;
use App\Entity\Society;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\HttpFoundation\Request;


class AddSocietyController extends AbstractController
{
    /**
     * @Route("/add/society", name="add_society")
     */
    public function Society(Request $request) {

        $society = new Society();
        $society->setPhone('0214256309');
        $society->setName('Securite sociale');
        $society->setType('Administration locale');
        $society->setWebsite('www.ameli.fr');

        $form = $this->createFormBuilder($society)
            ->add('phone', NumberType::class)
            ->add('name', TextType::class)
            ->add('type', TextType::class)
            ->add('website', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Ajouter une société'])
            ->getForm();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                // $form->getData() contient les valeurs soumises
                // Parcontre, tla variable originale `$society` sera également mise à jour
                $society = $form->getData();
        
                // Action pour sauvegarder les données dans la base de données
                // Par exemple, si Society est une Doctrine entity, il enregistrera les donnés du formulaire dans la table doctrine!
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($society);
                $entityManager->flush();
        
                return $this->redirectToRoute('contact');
            }

            return $this->render('society/new.html.twig', [
                'form' => $form->createView(),
            ]);
    }
    


   

  

}
