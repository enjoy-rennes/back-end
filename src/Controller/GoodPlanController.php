<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity;
use App\Entity\Society;
use App\Entity\GoodPlan;
use App\Entity\Address;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;



class GoodPlanController extends AbstractController
{
   /**
     * @Route("/good_plan_list", methods={"GET"}, name="good_plan_list")
     * 
     */ 
    public function index() {

        $good_plan= $this->getDoctrine()->getRepository
        (Goodplan::class)->findAll();

        return $this->render('good_plan/index.html.twig', array ('good_plan' => $good_plan));
     }

      /**
     * @Route("/good_plan_five", methods={"GET"}, name="good_plan_five")
     * 
     */ 
    public function GoodPlanFive() {

        $good_plan= $this->getDoctrine()->getRepository
        (Goodplan::class)->findById(array(2,3,4,5,6));

        return $this->render('good_plan/index.html.twig', array ('good_plan' => $good_plan));
     }
    
    /**
     * @Route("/good_plan/add", name="good_plan_add")
     */
    public function addGoodplan(Request $request) {
        $good_plan= new GoodPlan();
        $form = $this->createFormBuilder($good_plan)
            ->add('name', TextType::class)
            ->add('description', TextType::class)
            ->add('society', EntityType::class, array(
                'class'=>'App\Entity\Society',
                'choice_label'=>'name',
                'expanded'=>false,
                'multiple'=>false
            ))
            ->add('address', EntityType::class, array(
                'class'=>'App\Entity\Address',
                'choice_label'=>'name',
                'expanded'=>false,
                'multiple'=>false
            ))
            ->add('save', SubmitType::class, ['label' => 'Ajouter un bon plan'])
            ->getForm();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $good_plan = $form->getData();
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($good_plan);
                $entityManager->flush();
                return $this->redirectToRoute('good_plan_list');
            }
            return $this->render('good_plan/new.html.twig', [
                'form' => $form->createView(),
            ]);
    } 
    


     /**
     * @Route("/good_plan/update/{id}", methods={"GET", "POST"}, name="good_plan_update")
     */
    public function updateGoodplan(Request $request, $id) {

        $good_plan = new GoodPlan();
        $good_plan = $this->getDoctrine()->getRepository
       (GoodPlan::class)->find($id);

        $form = $this->createFormBuilder($good_plan)
        ->add('name', TextType::class)
        ->add('description', TextType::class)
        ->add('society', EntityType::class, array(
            'class'=>'App\Entity\Society',
            'choice_label'=>'name',
            'expanded'=>false,
            'multiple'=>false
        ))
        ->add('address', EntityType::class, array(
            'class'=>'App\Entity\Address',
            'choice_label'=>'name',
            'expanded'=>false,
            'multiple'=>false
        ))
        ->add('save', SubmitType::class, ['label' => 'Modifier'])
        ->getForm();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->flush();
        
                return $this->redirectToRoute('good_plan_list');
            }

            return $this->render('good_plan/update.html.twig', [
                'form' => $form->createView(),
            ]);
    }


   /**
     * @Route("/good_plan/{id}", name="good_plan_show")
     */ 
    public function showGoodplan($id) {
        $good_plan= $this->getDoctrine()->getRepository
        (GoodPlan::class)->find($id);
 
        return $this->render('good_plan/show.html.twig', array 
        ('good_plan' => $good_plan));
     }
    

    /**
     * @Route("/good_plan/delete/{id}", methods={"DELETE"}, name="good_plan_delete")
     * 
     */ 

    public function deleteGoodplan(Request $request, $id){
    $good_plan = $this->getDoctrine()-> getRepository(GoodPlan::class)->find($id);
    
    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->remove($good_plan);
    $entityManager->flush();

    $response = new Response();
    $response->send();

    }
}
