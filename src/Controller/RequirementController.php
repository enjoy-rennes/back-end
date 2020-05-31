<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity;
use App\Entity\Requirement;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;



class RequirementController extends AbstractController
{

    /**
     * @Route("/requirement_list", methods={"GET"}, name="requirement_list")
     * 
     */ 
    public function Requirement() {

        $requirement= $this->getDoctrine()->getRepository
        (Requirement::class)->findAll();

        $datas = array();
        foreach ($requirement as $key => $requirement) {

            $datas[$key]['id'] = $requirement->getId();
            $datas[$key]['name'] = $requirement->getName();
            $datas[$key]['operator'] = $requirement->getOperator();
            $datas[$key]['type'] = $requirement->getType();
            $datas[$key]['value'] = $requirement->getValue();

        }
        return new jsonResponse($datas);
     }

             
   /**
     * @Route("/requirement", methods={"GET"}, name="requirement")
     * 
     */ 
    public function index() {

        $requirement= $this->getDoctrine()->getRepository
        (Requirement::class)->findAll();

        return $this->render('requirement/index.html.twig', array ('requirement' => $requirement));
     }
    
    /**
     * @Route("/requirement/add", name="requirement_add")
     */
    public function addCondition(Request $request) {

        $requirement = new Requirement();
        $form = $this->createFormBuilder($requirement)
            ->add('name', TextType::class)
            ->add('operator', TextType::class)
            ->add('type', TextType::class)
            ->add('value', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Ajouter une condtion'])
            ->getForm();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $requirement = $form->getData();
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($requirement);
                $entityManager->flush();
        
                return $this->redirectToRoute('requirement_list');
            }

            return $this->render('requirement/new.html.twig', [
                'form' => $form->createView(),
            ]);
    }


     /**
     * @Route("/requirement/update/{id}", methods={"GET", "POST"}, name="requirement_update")
     */
    public function updateCondition(Request $request, $id) {

        $requirement = new Requirement();
        $requirement = $this->getDoctrine()->getRepository
       (Requirement::class)->find($id);

        $form = $this->createFormBuilder($requirement)
        ->add('name', TextType::class)
        ->add('operator', TextType::class)
        ->add('type', TextType::class)
        ->add('value', TextType::class)
        ->add('save', SubmitType::class, ['label' => 'Modifier'])
        ->getForm();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->flush();
        
                return $this->redirectToRoute('requirement_list');
            }

            return $this->render('requirement/update.html.twig', [
                'form' => $form->createView(),
            ]);
    }



    /**
     * @Route("/requirement/{id}", name="requirement_show")
     */ 
    public function showCondition($id) {
       $requirement = $this->getDoctrine()->getRepository
       (Requirement::class)->find($id);

       return $this->render('requirement/show.html.twig', array 
       ('requirement' => $requirement));
      
    }
    

    /**
     * @Route("/requirement/delete/{id}", methods={"DELETE"}, name="requirement_delete")
     * 
     */ 

    public function deleteCondition(Request $request, $id){
    $requirement = $this->getDoctrine()-> getRepository(Requirement::class)->find($id);
    
    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->remove($requirement);
    $entityManager->flush();

    $response = new Response();
    $response->send();

    }
}
