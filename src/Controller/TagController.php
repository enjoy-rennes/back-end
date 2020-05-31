<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity;
use App\Entity\Tag;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\HttpFoundation\Request;


class TagController extends AbstractController
{

    /**
     * @Route("/tag", methods={"GET"}, name="tag")
     * 
     */ 
    public function ListTag() {

        $tag= $this->getDoctrine()->getRepository
        (Tag::class)->findAll();

        return $this->render('tag/index.html.twig', array ('tag' => $tag));
     }
    
     /**
     * @Route("/tag_list", methods={"GET"}, name="tag_list")
     * 
     */ 
    public function tag() {

        $tag= $this->getDoctrine()->getRepository
        (Tag::class)->findAll();

        $datas = array();
        foreach ($tag as $key => $tag) {
            $datas[$key]['id'] = $tag->getId();
            $datas[$key]['name'] = $tag->getName();
        }
        
        return new JsonResponse($datas);
        //return $this->render('tag/index.html.twig', array ('tag' => $tag));
     }
         
    
    /**
     * @Route("/tag/add", name="tag_add")
     */
    public function addTag(Request $request) {

        $tag= new Tag();
        $form = $this->createFormBuilder($tag)
            ->add('name', TextType::class)
            
            ->add('save', SubmitType::class, ['label' => 'Ajouter un tag'])
            ->getForm();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $tag = $form->getData();
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($tag);
                $entityManager->flush();
        
                return $this->redirectToRoute('tag_list');
            }

            return $this->render('tag/new.html.twig', [
                'form' => $form->createView(),
            ]);
    }


     /**
     * @Route("/tag/update/{id}", methods={"GET", "POST"}, name="tag_update")
     */
    public function updateTag(Request $request, $id) {

        $tag = new Tag();
        $tag = $this->getDoctrine()->getRepository
       (Tag::class)->find($id);

        $form = $this->createFormBuilder($tag)
        ->add('name', TextType::class)

        ->add('save', SubmitType::class, ['label' => 'Modifier'])
        ->getForm();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->flush();
        
                return $this->redirectToRoute('tag_list');
            }

            return $this->render('tag/update.html.twig', [
                'form' => $form->createView(),
            ]);
    }



    /**
     * @Route("/tag/{id}", name="tag_show")
     */ 
    public function showTag($id) {
       $tag = $this->getDoctrine()->getRepository
       (Tag::class)->find($id);

       return $this->render('tag/show.html.twig', array 
       ('tag' => $tag));
      
    }
    

    /**
     * @Route("/tag/delete/{id}", methods={"DELETE"}, name="tag_delete")
     * 
     */ 

    public function deleteTag(Request $request, $id){
    $tag= $this->getDoctrine()-> getRepository(Tag::class)->find($id);
    
    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->remove($tag);
    $entityManager->flush();

    $response = new Response();
    $response->send();

    
    }
    
}
