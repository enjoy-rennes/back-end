<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity;
use App\Entity\Society;
use App\Entity\Address;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\JsonResponse;



class SocietyController extends AbstractController
{

    /**
     * @Route("/place_list", methods={"GET"}, name="place_list")
     * 
     */ 
    
    public function Place() {

        $society= $this->getDoctrine()->getRepository
        (Society::class)->findById(array(6,1,5,9,14));

        $society= $this->getDoctrine()->getRepository
        (Society::class)->findAll();

        $datas = array();
        foreach ($society as $key => $society) {

            $datas[$key]['id'] = $society->getId();
            $datas[$key]['phone'] = $society->getPhone();
            $datas[$key]['name'] = $society->getName();
            $datas[$key]['type'] = $society->getType();
            $datas[$key]['website'] = $society->getWebsite();
            $datas[$key]['description'] = $society->getDescription();
            $datas[$key]['address'] = $society->getAddress();

        }
        return new jsonResponse($datas);
     }

    
    /**
     * @Route("/place", methods={"GET"}, name="place")
     * 
     */ 
    
    public function PlaceDiscover() {

        $society= $this->getDoctrine()->getRepository
        (Society::class)->findById(array(6,1,5,9,14));

        return $this->render('society/index.html.twig', array ('society' => $society));
     }

     /**
     * @Route("/society_list", methods={"GET"}, name="society_list")
     * 
     */ 
    public function Society() {

        $society= $this->getDoctrine()->getRepository
        (Society::class)->findAll();

        $datas = array();
        foreach ($society as $key => $society) {

            $datas[$key]['id'] = $society->getId();
            $datas[$key]['phone'] = $society->getPhone();
            $datas[$key]['name'] = $society->getName();
            $datas[$key]['type'] = $society->getType();
            $datas[$key]['website'] = $society->getWebsite();
            $datas[$key]['description'] = $society->getDescription();
            $datas[$key]['address'] = $society->getAddress();

        }
        return new jsonResponse($datas);
     }


   /**
     * @Route("/society", methods={"GET"}, name="app_homepage")
     * 
     */ 
     public function SocietyList() {

        $society= $this->getDoctrine()->getRepository
        (Society::class)->findAll();

        return $this->render('society/index.html.twig', array ('society' => $society));
     }
    
    
    /**
     * @Route("/society/add", name="society_add")
     */
    public function AddSociety(Request $request) {

        $society = new Society();

        $form = $this->createFormBuilder($society)
            ->add('phone', NumberType::class)
            ->add('name', TextType::class)
            ->add('type', TextType::class)
            ->add('website', TextType::class)
            ->add('description', TextareaType::class)
            ->add('address', EntityType::class, array(
                'class'=>'App\Entity\Address',
                'choice_label'=>'name',
                'expanded'=>false,
                'multiple'=>false
            ))
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
        
                return $this->redirectToRoute('app_homepage');
            }

            return $this->render('society/new.html.twig', [
                'form' => $form->createView(),
            ]);
    }


     /**
     * @Route("/society/update/{id}", methods={"GET", "POST"}, name="society_update")
     */
    public function UpdateSociety(Request $request, $id) {

        $society = new Society();
        $society = $this->getDoctrine()->getRepository
       (Society::class)->find($id);
       

        $form = $this->createFormBuilder($society)
            ->add('phone', NumberType::class)
            ->add('name', TextType::class)
            ->add('type', TextType::class)
            ->add('website', TextType::class)
            ->add('description', TextareaType::class)
            ->add('address', EntityType::class, array(
                'class'=>'App\Entity\Address',
                'choice_label'=>'name',
                'expanded'=>false,
                'multiple'=>false
            ))
            ->add('save', SubmitType::class, ['label' => 'Modfier la société'])
            ->getForm();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->flush();
        
                return $this->redirectToRoute('app_homepage');
            }

            return $this->render('society/update.html.twig', [
                'form' => $form->createView(),
            ]);
    }



    /**
     * @Route("/society/{id}", name="society_show")
     */ 
    public function ShowSociety($id) {
       $society = $this->getDoctrine()->getRepository
       (Society::class)->find($id);

       return $this->render('society/show.html.twig', array 
       ('society' => $society));
      
    }
    

    /**
     * @Route("/society/delete/{id}", methods={"DELETE"}, name="society_delete")
     * 
     */ 

    public function DeleteSociety(Request $request, $id){
    $society = $this->getDoctrine()-> getRepository(Society::class)->find($id);
    
    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->remove($society);
    $entityManager->flush();

    $response = new Response();
    $response->send();

    }
}


