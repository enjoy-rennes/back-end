<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity;
use App\Entity\Conditions;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\HttpFoundation\Request;

class ConditionsController extends AbstractController
{
             
   /**
     * @Route("/conditions_list", methods={"GET"}, name="conditions_list")
     * 
     */ 
    public function index() {

        $conditions= $this->getDoctrine()->getRepository
        (Conditions::class)->findAll();

        return $this->render('conditions/index.html.twig', array ('conditions' => $conditions));
     }
    
    /**
     * @Route("/conditions/add", name="conditions_add")
     */
    public function addCondition(Request $request) {

        $conditions = new Conditions();
        $form = $this->createFormBuilder($conditions)
            ->add('name', TextType::class)
            ->add('operator', TextType::class)
            ->add('type', TextType::class)
            ->add('estimate', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Ajouter une condtion'])
            ->getForm();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $conditions = $form->getData();
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($conditions);
                $entityManager->flush();
        
                return $this->redirectToRoute('conditions_list');
            }

            return $this->render('conditions/new.html.twig', [
                'form' => $form->createView(),
            ]);
    }


     /**
     * @Route("/conditions/update/{id}", methods={"GET", "POST"}, name="conditions_update")
     */
    public function updateCondition(Request $request, $id) {

        $conditions = new Conditions();
        $conditions = $this->getDoctrine()->getRepository
       (Conditions::class)->find($id);

        $form = $this->createFormBuilder($conditions)
        ->add('name', TextType::class)
        ->add('operator', TextType::class)
        ->add('type', TextType::class)
        ->add('estimate', TextType::class)
        ->add('save', SubmitType::class, ['label' => 'Modifier'])
        ->getForm();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->flush();
        
                return $this->redirectToRoute('conditions_list');
            }

            return $this->render('conditions/update.html.twig', [
                'form' => $form->createView(),
            ]);
    }



    /**
     * @Route("/conditions/{id}", name="conditions_show")
     */ 
    public function showCondition($id) {
       $conditions = $this->getDoctrine()->getRepository
       (Conditions::class)->find($id);

       return $this->render('conditions/show.html.twig', array 
       ('conditions' => $conditions));
      
    }
    

    /**
     * @Route("/conditions/delete/{id}", methods={"DELETE"}, name="conditions_delete")
     * 
     */ 

    public function deleteCondition(Request $request, $id){
    $conditions = $this->getDoctrine()-> getRepository(Conditions::class)->find($id);
    
    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->remove($conditions);
    $entityManager->flush();

    $response = new Response();
    $response->send();

    }
}
