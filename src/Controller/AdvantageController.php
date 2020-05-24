<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity;
use App\Entity\Society;
use App\Entity\Advantage;
use App\Entity\Tag;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;



class AdvantageController extends AbstractController
{
   /**
     * @Route("/advantage_list", methods={"GET"}, name="advantage_list")
     * 
     */ 
    public function index() {

        $advantage= $this->getDoctrine()->getRepository
        (Advantage::class)->findAll();

        return $this->render('advantage/index.html.twig', array ('advantage' => $advantage));
     }

     
    
    /**
     * @Route("/advantage/add", name="advantage_add")
     */
    public function addAdvantage(Request $request) {
        $advantage= new Advantage();
        $form = $this->createFormBuilder($advantage)
            ->add('name', TextType::class)
            ->add('description', TextType::class)
            ->add('society', EntityType::class, array(
                'class'=>'App\Entity\Society',
                'choice_label'=>'name',
                'expanded'=>false,
                'multiple'=>true
            ))

            ->add('tag', EntityType::class, array(
                'class'=>'App\Entity\Tag',
                'choice_label'=>'name',
                'expanded'=>false,
                'multiple'=>true
            ))

            ->add('save', SubmitType::class, ['label' => 'Ajouter un bon plan'])
            ->getForm();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $advantage= $form->getData();
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($advantage);
                $entityManager->flush();
                return $this->redirectToRoute('advantage_list');
            }
            return $this->render('advantage/new.html.twig', [
                'form' => $form->createView(),
            ]);
    } 
    


     /**
     * @Route("/advantage/update/{id}", methods={"GET", "POST"}, name="advantage_update")
     */
    public function updateAdvantage(Request $request, $id) {

        $advantage= new Advantage();
        $advantage = $this->getDoctrine()->getRepository
       (Advantage::class)->find($id);

        $form = $this->createFormBuilder($advantage)
        ->add('name', TextType::class)
        ->add('description', TextType::class)
        ->add('society', EntityType::class, array(
            'class'=>'App\Entity\Society',
            'choice_label'=>'name',
            'expanded'=>false,
            'multiple'=>true
        ))

        ->add('tag', EntityType::class, array(
            'class'=>'App\Entity\Tag',
            'choice_label'=>'name',
            'expanded'=>false,
            'multiple'=>true
        ))
        
        ->add('save', SubmitType::class, ['label' => 'Modifier'])
        ->getForm();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->flush();
        
                return $this->redirectToRoute('advantage_list');
            }

            return $this->render('advantage/update.html.twig', [
                'form' => $form->createView(),
            ]);
    }


   /**
     * @Route("/advantage/{id}", name="advantage_show")
     */ 
    public function showAdvantage($id) {
        $advantage= $this->getDoctrine()->getRepository
        (Advantage::class)->find($id);
 
        return $this->render('advantage/show.html.twig', array 
        ('advantage' => $advantage));
     }
    

    /**
     * @Route("/advantage/delete/{id}", methods={"DELETE"}, name="advantage_delete")
     * 
     */ 

    public function deleteAdvantage(Request $request, $id){
    $advantage = $this->getDoctrine()-> getRepository(Advantage::class)->find($id);
    
    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->remove($advantage);
    $entityManager->flush();

    $response = new Response();
    $response->send();

    }
}
