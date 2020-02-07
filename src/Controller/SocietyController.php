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



class SocietyController extends AbstractController
{
    

   /**
     * @Route("/society_list", methods={"GET"}, name="society_list")
     * 
     */ 
     public function index() {

        $society= $this->getDoctrine()->getRepository
        (Society::class)->findAll();

        return $this->render('society/index.html.twig', array ('society' => $society));
     }
    
    
    /**
     * @Route("/society/add", name="society_add")
     */
    public function addSociety(Request $request) {

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
        
                return $this->redirectToRoute('society_list');
            }

            return $this->render('society/new.html.twig', [
                'form' => $form->createView(),
            ]);
    }


     /**
     * @Route("/society/update/{id}", methods={"GET", "POST"}, name="society_add")
     */
    public function updateSociety(Request $request, $id) {

        $society = new Society();
        $society = $this->getDoctrine()->getRepository
       (Society::class)->find($id);

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
                
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->flush();
        
                return $this->redirectToRoute('society_list');
            }

            return $this->render('society/update.html.twig', [
                'form' => $form->createView(),
            ]);
    }



    /**
     * @Route("/society/{id}", name="society_show")
     */ 
    public function showSociety($id) {
       $society = $this->getDoctrine()->getRepository
       (Society::class)->find($id);

       return $this->render('society/show.html.twig', array 
       ('society' => $society));
      
    }
    



    /**
     * @Route("/society/delete/{id}", methods={"DELETE"}, name="society_delete")
     * 
     */ 

    public function deleteSociety(Request $request, $id){
    $society = $this->getDoctrine()-> getRepository(Society::class)->find($id);
    
    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->remove($society);
    $entityManager->flush();

    $response = new Response();
    $response->send();

    }
}

