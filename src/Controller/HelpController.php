<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity;
use App\Entity\Help;
use App\Entity\Tag;
use App\Entity\Requirement;
use App\Entity\Society;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;



class HelpController extends AbstractController
{

    /**
     * @Route("/help", methods={"GET"}, name="help")
     * 
     */ 
    public function index() {

        $help= $this->getDoctrine()->getRepository
        (Help::class)->findAll();

        return $this->render('help/index.html.twig', array ('help' => $help));
     }



     /**
     * @Route("/help_list", methods={"GET"}, name="help_list")
     * 
     */ 
    public function help() {

        $help= $this->getDoctrine()->getRepository
        (Help::class)->findAll();

        $datas = array();
        foreach ($help as $key => $help) {

            $datas[$key]['id'] = $help->getId();
            $datas[$key]['name'] = $help->getName();
            $datas[$key]['description'] = $help->getDescription();
            $datas[$key]['requirement'] = $help->getRequirement();
            $datas[$key]['tag'] = $help->getTag();
            $datas[$key]['society'] = $help->getSociety();


        }
        return new jsonResponse($datas);
     }



   
      /**
     * @Route("/help_five", methods={"GET"}, name="help_five")
     * 
     */ 
    public function Help_five() {

        $help= $this->getDoctrine()->getRepository
        (Help::class)->findById(array(4,8,12,21,7));

        return $this->render('help/index.html.twig', array ('help' => $help));
     }

    
    /**
     * @Route("/help/add", name="help_add")
     */
    public function addHelp(Request $request) {
        $help = new Help();
        $form = $this->createFormBuilder($help)
            ->add('name', TextType::class)
            ->add('description', TextType::class)
            ->add('tag', EntityType::class, array(
                'class'=>'App\Entity\Tag',
                'choice_label'=>'name',
                'expanded'=>false,
                'multiple'=>true
            ))
            ->add('society', EntityType::class, array(
                'class'=>'App\Entity\Society',
                'choice_label'=>'name',
                'expanded'=>false,
                'multiple'=>true
            ))
            ->add('requirement', EntityType::class, array(
                'class'=>'App\Entity\Requirement',
                'choice_label'=>'name',
                'expanded'=>false,
                'multiple'=>true
            ))
            ->add('save', SubmitType::class, ['label' => 'Ajouter une aide'])
            ->getForm();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $help = $form->getData();
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($help);
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
        ->add('name', TextType::class,  array('data_class' => null))
        ->add('description', TextType::class,  array('data_class' => null))
        ->add('tag', EntityType::class, array(
            'class'=>'App\Entity\Tag',
            'choice_label'=>'name',
            'expanded'=>false,
            'multiple'=>true
        ))
        ->add('society', EntityType::class, array(
            'class'=>'App\Entity\Society',
            'choice_label'=>'name',
            'expanded'=>false,
            'multiple'=>true
        ))
        ->add('requirement', EntityType::class, array(
            'class'=>'App\Entity\Requirement',
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
        
                return $this->redirectToRoute('help_list');
            }

            return $this->render('help/update.html.twig', [
                'form' => $form->createView(),
            ]);
    }


   /**
     * @Route("/help/{id}", name="help_show")
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
