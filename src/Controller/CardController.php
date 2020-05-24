<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity;
use App\Entity\Society;
use App\Entity\Card;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;



class CardController extends AbstractController
{
   /**
     * @Route("/card_list", methods={"GET"}, name="card_list")
     * 
     */ 
    public function index() {

        $card= $this->getDoctrine()->getRepository
        (Card::class)->findAll();

        return $this->render('card/index.html.twig', array ('card' => $card));
     }

     /**
     * @Route("/shop", methods={"GET"}, name="shop")
     * 
     */ 
    public function Shop() {

        $card= $this->getDoctrine()->getRepository
        (Card::class)->findAll();

        return $this->render('card/shop.html.twig', array ('card' => $card));
     }
    
    /**
     * @Route("/card/add", name="card_add")
     */
    public function addCard(Request $request) {
        $card = new Card();
        $form = $this->createFormBuilder($card)
            ->add('name', TextType::class)
            ->add('description', TextType::class)
            ->add('society', EntityType::class, array(
                'class'=>'App\Entity\Society',
                'choice_label'=>'name',
                'expanded'=>false,
                'multiple'=>false
            ))
            ->add('save', SubmitType::class, ['label' => 'Ajouter une carte'])
            ->getForm();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $card = $form->getData();
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($card);
                $entityManager->flush();
                return $this->redirectToRoute('card_list');
            }
            return $this->render('card/new.html.twig', [
                'form' => $form->createView(),
            ]);
    } 
    


     /**
     * @Route("/card/update/{id}", methods={"GET", "POST"}, name="card_update")
     */
    public function updateCard(Request $request, $id) {

        $card = new Card();
        $card = $this->getDoctrine()->getRepository
       (Card::class)->find($id);

        $form = $this->createFormBuilder($card)
        ->add('name', TextType::class)
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
        
                return $this->redirectToRoute('card_list');
            }

            return $this->render('card/update.html.twig', [
                'form' => $form->createView(),
            ]);
    }


   /**
     * @Route("/card/{id}", name="card_show")
     */ 
    public function showCard($id) {
        $card = $this->getDoctrine()->getRepository
        (Card::class)->find($id);
 
        return $this->render('card/show.html.twig', array 
        ('card' => $card));
     }
    

    /**
     * @Route("/card/delete/{id}", methods={"DELETE"}, name="card_delete")
     * 
     */ 

    public function deletecard(Request $request, $id){
    $card = $this->getDoctrine()-> getRepository(Card::class)->find($id);
    
    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->remove($card);
    $entityManager->flush();

    $response = new Response();
    $response->send();

    }
}
