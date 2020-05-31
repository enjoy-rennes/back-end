<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity;
use App\Entity\Society;
use App\Entity\Actuality;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\JsonResponse;


class ActualityController extends AbstractController
{

     /**
     * @Route("/actuality_list", methods={"GET"}, name="actuality_list")
     * 
     */ 
    public function Actuality() {

        $actuality= $this->getDoctrine()->getRepository
        (Actuality::class)->findAll();

        $datas = array();
        foreach ($actuality as $key => $actuality) {

            $datas[$key]['id'] = $actuality->getId();
            $datas[$key]['name'] = $actuality->getName();
            $datas[$key]['description'] = $actuality->getDescription();
            $datas[$key]['date'] = $actuality->getDate();

        }
        return new jsonResponse($datas);
     }

    /**
     * @Route("/actuality", methods={"GET"}, name="actuality")
     * 
     */ 
    public function index() {

        $actuality= $this->getDoctrine()->getRepository
        (actuality::class)->findAll();

        return $this->render('actuality/index.html.twig', array ('actuality' => $actuality));
     }
    
    /**
     * @Route("/actuality/add", name="actuality_add")
     */
    public function addactuality(Request $request) {
        $actuality = new actuality();
        $form = $this->createFormBuilder($actuality)
            ->add('name', TextType::class)
            ->add('date', DateType::class)
            ->add('description', TextAreaType::class)
            ->add('society', EntityType::class, array(
                'class'=>'App\Entity\Society',
                'choice_label'=>'name',
                'expanded'=>false,
                'multiple'=>true
            ))
            ->add('save', SubmitType::class, ['label' => 'Ajouter une actualité'])
            ->getForm();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $actuality = $form->getData();
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($actuality);
                $entityManager->flush();
                return $this->redirectToRoute('actuality_list');
            }
            return $this->render('actuality/new.html.twig', [
                'form' => $form->createView(),
            ]);
    } 
    


     /**
     * @Route("/actuality/update/{id}", methods={"GET", "POST"}, name="actuality_update")
     */
    public function updateactuality(Request $request, $id) {

        $actuality = new actuality();
        $actuality = $this->getDoctrine()->getRepository
       (actuality::class)->find($id);

        $form = $this->createFormBuilder($actuality)
        ->add('name', TextType::class)
        ->add('date', DateType::class)
        ->add('description', TextType::class)
        ->add('society', EntityType::class, array(
            'class'=>'App\Entity\Society',
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
        
                return $this->redirectToRoute('actuality_list');
            }

            return $this->render('actuality/update.html.twig', [
                'form' => $form->createView(),
            ]);
    }


   /**
     * @Route("/actuality/{id}", name="actuality_show")
     */ 
    public function showactuality($id) {
        $actuality = $this->getDoctrine()->getRepository
        (actuality::class)->find($id);
 
        return $this->render('actuality/show.html.twig', array 
        ('actuality' => $actuality));
     }
    

    /**
     * @Route("/actuality/delete/{id}", methods={"DELETE"}, name="actuality_delete")
     * 
     */ 

    public function deleteactuality(Request $request, $id){
    $actuality = $this->getDoctrine()-> getRepository(actuality::class)->find($id);
    
    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->remove($actuality);
    $entityManager->flush();

    $response = new Response();
    $response->send();

    }
}
