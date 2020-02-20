<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity;
use App\Entity\Adress;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

use Symfony\Component\HttpFoundation\Request;

class AdressController extends AbstractController
{
    /**
     * @Route("/adress_list", methods={"GET"}, name="adress_list")
     * 
     */ 
    public function index() {

        $adress= $this->getDoctrine()->getRepository
        (Adress::class)->findAll();

        return $this->render('adress/index.html.twig', array ('adress' => $adress));
     }
    
    
    /**
     * @Route("/adress/add", name="adress_add")
     */
    public function addAdress(Request $request) {

        $adress = new Adress();

        $form = $this->createFormBuilder($adress)
            ->add('postalCode', NumberType::class)
            ->add('streetNumber', TextType::class)
            ->add('adress', TextType::class)
            ->add('city', TextType::class)
            ->add('country', TextType::class)
            ->add('name', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Ajouter'])
            ->getForm();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $adress = $form->getData();
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($adress);
                $entityManager->flush();
                return $this->redirectToRoute('adress_list');
            }

            return $this->render('adress/new.html.twig', [
                'form' => $form->createView(),
            ]);
    }


     /**
     * @Route("/adress/update/{id}", methods={"GET", "POST"}, name="adress_update")
     */
    public function updateAdress(Request $request, $id) {

        $adress = new Adress();
        $adress = $this->getDoctrine()->getRepository
       (Adress::class)->find($id);

            $form = $this->createFormBuilder($adress)
            ->add('postalCode', NumberType::class)
            ->add('streetNumber', TextType::class)
            ->add('adress', TextType::class)
            ->add('city', TextType::class)
            ->add('country', TextType::class)
            ->add('name', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Modifier'])
            ->getForm();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->flush();
        
                return $this->redirectToRoute('adress_list');
            }

            return $this->render('adress/update.html.twig', [
                'form' => $form->createView(),
            ]);
    }



    /**
     * @Route("/adress/{id}", name="adress_show")
     */ 
    public function showAdress($id) {
       $adress = $this->getDoctrine()->getRepository
       (Adress::class)->find($id);

       return $this->render('adress/show.html.twig', array 
       ('adress' => $adress));
      
    }
    

    /**
     * @Route("/adress/delete/{id}", methods={"DELETE"}, name="adress_delete")
     * 
     */ 

    public function deleteAdress(Request $request, $id){
    $adress = $this->getDoctrine()-> getRepository(Adress::class)->find($id);
    
    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->remove($adress);
    $entityManager->flush();

    $response = new Response();
    $response->send();

    }
}
