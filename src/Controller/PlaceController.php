<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity;
use App\Entity\Society;
use App\Entity\Place;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PlaceController extends AbstractController
{
    /**
     * @Route("/place_list", methods={"GET"}, name="place_list")
     * 
     */ 
    public function index() {

        $place= $this->getDoctrine()->getRepository
        (Place::class)->findAll();

        return $this->render('place/index.html.twig', array ('place' => $place));
     }
    
    /**
     * @Route("/place/add", name="place_add")
     */
    public function addPlace(Request $request) {
        $place = new Place();
        $form = $this->createFormBuilder($place)
            ->add('name', TextType::class)
            ->add('date', DateType::class)
            ->add('description', TextAreaType::class)
            ->add('society', EntityType::class, array(
                'class'=>'App\Entity\Society',
                'choice_label'=>'name',
                'expanded'=>false,
                'multiple'=>false
            ))
            ->add('save', SubmitType::class, ['label' => 'Ajouter un lieu'])
            ->getForm();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $place = $form->getData();
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($place);
                $entityManager->flush();
                return $this->redirectToRoute('place_list');
            }
            return $this->render('place/new.html.twig', [
                'form' => $form->createView(),
            ]);
    } 
    


     /**
     * @Route("/place/update/{id}", methods={"GET", "POST"}, name="place_update")
     */
    public function updatePlace(Request $request, $id) {

        $place = new Place();
        $place = $this->getDoctrine()->getRepository
       (Place::class)->find($id);

        $form = $this->createFormBuilder($place)
        ->add('name', TextType::class)
        ->add('date', DateType::class)
        ->add('description', TextType::class)
        ->add('society', EntityType::class, array(
            'class'=>'App\Entity\Society',
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
        
                return $this->redirectToRoute('place_list');
            }

            return $this->render('place/update.html.twig', [
                'form' => $form->createView(),
            ]);
    }


   /**
     * @Route("/place/{id}", name="place_show")
     */ 
    public function showPlace($id) {
        $place = $this->getDoctrine()->getRepository
        (Place::class)->find($id);
 
        return $this->render('place/show.html.twig', array 
        ('place' => $place));
     }
    

   /**
     * @Route("/place/delete/{id}", methods={"DELETE"}, name="place_delete")
     * 
     */ 

    public function deletecard(Request $request, $id){
        $place = $this->getDoctrine()-> getRepository(Place::class)->find($id);
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($place);
        $entityManager->flush();
    
        $response = new Response();
        $response->send();
    
        }
}
