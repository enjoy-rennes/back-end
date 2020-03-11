<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity;
use App\Entity\Help;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class HelpController extends AbstractController
{
   /**
     * @Route("/help_list", methods={"GET"}, name="help_list")
     * 
     */ 
    public function index() {

        $help= $this->getDoctrine()->getRepository
        (Help::class)->findAll();

        return $this->render('help/index.html.twig', array ('help' => $help));
     }
    
    /**
     * @Route("/help/add", name="help_add")
     */
    public function addHelp(Request $request) {

        $category = new Category();
        $help = new Help();
        $form = $this->createFormBuilder($help)
            ->add('name', TextType::class)
            ->add('type', EntityType::class, array(

                'class'=>'App\Entity\Category',
                'choice_label'=>'type',
                'expanded'=>false,
                'multiple'=>false
            ))
            ->add('save', SubmitType::class, ['label' => 'Ajouter une aide'])
            ->getForm();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $help = $form->getData();
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($help);
                $entityManager->persist($category);

                $entityManager->flush();
        
                return $this->redirectToRoute('help_list');
            }

            return $this->render('help/new.html.twig', [
                'form' => $form->createView(),
            ]);
    }


     /**
     * @Route("/help/update/{id}", methods={"GET", "POST"}, name="help_update")
     */
    public function updateHelp(Request $request, $id) {

        $help = new Help();
        $help = $this->getDoctrine()->getRepository
       (Help::class)->find($id);

        $form = $this->createFormBuilder($help)
        ->add('name', TextType::class)
        ->add('category_type', TextType::class)
        ->add('type', TextType::class)
        ->add('save', SubmitType::class, ['label' => 'Modifier'])
        ->getForm();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->flush();
        
                return $this->redirectToRoute('help_list');
            }

            return $this->render('help/update.html.twig', [
                'form' => $form->createView(),
            ]);
    }



    /**
     * @Route("/help{id}", name="help_show")
     */ 
    public function showHelp($id) {
       $help = $this->getDoctrine()->getRepository
       (Help::class)->find($id);

       return $this->render('help/show.html.twig', array 
       ('help' => $help));
      
    }
    

    /**
     * @Route("/help/delete/{id}", methods={"DELETE"}, name="help_delete")
     * 
     */ 

    public function deleteHelp(Request $request, $id){
    $help = $this->getDoctrine()-> getRepository(Help::class)->find($id);
    
    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->remove($help);
    $entityManager->flush();

    $response = new Response();
    $response->send();

    }
}
