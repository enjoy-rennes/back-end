<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity;
use App\Entity\Help;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\HttpFoundation\Request;





class HelpController extends AbstractController
{
    /**
     * @Route("/help", name="help")
     */
    public function new (request $request) 
    {
    
        $help = new Help();
        $help->setName('help');
        $help->setDescription('help descript');

    $form = $this->createFormBuilder($help)
    ->add('name', TextType::class)
    ->add('description', TextType::class)
    ->add('save', SubmitType::class, ['label' => 'Ajouter aide'])
    ->getForm();
    $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()) {

        $help = $form->getData();
        $entityManager = $this->getDoctrine->getManager();
        $entityManager->persist($help);
        $entityManager->flush();

        return $this->redirectToRoute('contact');

        
    }
         return $this->render('help/new.html.twig', [
        'form' => $form->createView(),
    ]);

     }
    
    }

