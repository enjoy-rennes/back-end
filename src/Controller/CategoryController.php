<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity;
use App\Entity\Category;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\HttpFoundation\Request;


class CategoryController extends AbstractController
{
     /**
     * @Route("/category_list", methods={"GET"}, name="category_list")
     * 
     */ 
    public function index() {

        $category= $this->getDoctrine()->getRepository
        (Category::class)->findAll();

        return $this->render('category/index.html.twig', array ('category' => $category));
     }
         
    
    /**
     * @Route("/category/add", name="category_add")
     */
    public function addCategory(Request $request) {

        $category = new Category();
        $form = $this->createFormBuilder($category)
            ->add('type', TextType::class)
            
            ->add('save', SubmitType::class, ['label' => 'Ajouter une catégorie'])
            ->getForm();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $category = $form->getData();
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($category);
                $entityManager->flush();
        
                return $this->redirectToRoute('category_list');
            }

            return $this->render('category/new.html.twig', [
                'form' => $form->createView(),
            ]);
    }


     /**
     * @Route("/category/update/{id}", methods={"GET", "POST"}, name="category_update")
     */
    public function updateCategory(Request $request, $id) {

        $category = new Category();
        $category = $this->getDoctrine()->getRepository
       (Category::class)->find($id);

        $form = $this->createFormBuilder($category)
        ->add('type', TextType::class)

        ->add('save', SubmitType::class, ['label' => 'Modifier'])
        ->getForm();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->flush();
        
                return $this->redirectToRoute('category_list');
            }

            return $this->render('category/update.html.twig', [
                'form' => $form->createView(),
            ]);
    }



    /**
     * @Route("/category/{id}", name="category_show")
     */ 
    public function showCategory($id) {
       $category = $this->getDoctrine()->getRepository
       (Category::class)->find($id);

       return $this->render('category/show.html.twig', array 
       ('category' => $category));
      
    }
    

    /**
     * @Route("/category/delete/{id}", methods={"DELETE"}, name="category_delete")
     * 
     */ 

    public function deleteCategory(Request $request, $id){
    $category = $this->getDoctrine()-> getRepository(Category::class)->find($id);
    
    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->remove($category);
    $entityManager->flush();

    $response = new Response();
    $response->send();

    
    }
}
