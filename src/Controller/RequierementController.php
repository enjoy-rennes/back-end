<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity;
use App\Entity\Requierement;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\HttpFoundation\Request;

class RequierementController extends AbstractController
{
             
   /**
     * @Route("/requierement_list", methods={"GET"}, name="requierement_list")
     * 
     */ 
    public function index() {

        $requierement= $this->getDoctrine()->getRepository
        (Requierement::class)->findAll();

        return $this->render('requierement/index.html.twig', array ('requierement' => $requierement));
     }
    
    /**
     * @Route("/requierement/add", name="requierement_add")
     */
    public function addCondition(Request $request) {

        $requierement = new Requierement();
        $form = $this->createFormBuilder($requierement)
            ->add('name', TextType::class)
            ->add('operator', TextType::class)
            ->add('type', TextType::class)
            ->add('value', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Ajouter une condtion'])
            ->getForm();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $requierement = $form->getData();
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($requierement);
                $entityManager->flush();
        
                return $this->redirectToRoute('requierement_list');
            }

            return $this->render('requierement/new.html.twig', [
                'form' => $form->createView(),
            ]);
    }


     /**
     * @Route("/requierement/update/{id}", methods={"GET", "POST"}, name="requierement_update")
     */
    public function updateCondition(Request $request, $id) {

        $requierement = new Requierement();
        $requierement = $this->getDoctrine()->getRepository
       (Requierement::class)->find($id);

        $form = $this->createFormBuilder($requierement)
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
        
                return $this->redirectToRoute('requierement_list');
            }

            return $this->render('requierement/update.html.twig', [
                'form' => $form->createView(),
            ]);
    }



    /**
     * @Route("/requierement/{id}", name="requierement_show")
     */ 
    public function showCondition($id) {
       $requierement = $this->getDoctrine()->getRepository
       (Requierement::class)->find($id);

       return $this->render('requierement/show.html.twig', array 
       ('requierement' => $requierement));
      
    }
    

    /**
     * @Route("/requierement/delete/{id}", methods={"DELETE"}, name="requierement_delete")
     * 
     */ 

    public function deleteCondition(Request $request, $id){
    $requierement = $this->getDoctrine()-> getRepository(Requierement::class)->find($id);
    
    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->remove($requierement);
    $entityManager->flush();

    $response = new Response();
    $response->send();

    }
}
