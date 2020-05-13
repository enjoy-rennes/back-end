<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity;
use App\Entity\Society;
use App\Entity\News;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class NewsController extends AbstractController
{
    /**
     * @Route("/news_list", methods={"GET"}, name="news_list")
     * 
     */ 
    public function index() {

        $news= $this->getDoctrine()->getRepository
        (News::class)->findAll();

        return $this->render('news/index.html.twig', array ('news' => $news));
     }

     /**
     * @Route("/news_five", methods={"GET"}, name="news_five")
     * 
     */ 
    public function NewsFive() {

        $news= $this->getDoctrine()->getRepository
        (News::class)->findById(array(1,2,3,4,5));

        return $this->render('news/index.html.twig', array ('news' => $news));
     }
    
    /**
     * @Route("/news/add", name="news_add")
     */
    public function addNews(Request $request) {
        $news = new News();
        $form = $this->createFormBuilder($news)
            ->add('name', TextType::class)
            ->add('date', DateType::class)
            ->add('description', TextAreaType::class)
            ->add('society', EntityType::class, array(
                'class'=>'App\Entity\Society',
                'choice_label'=>'name',
                'expanded'=>false,
                'multiple'=>false
            ))
            ->add('save', SubmitType::class, ['label' => 'Ajouter une actualité'])
            ->getForm();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $news = $form->getData();
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($news);
                $entityManager->flush();
                return $this->redirectToRoute('news_list');
            }
            return $this->render('news/new.html.twig', [
                'form' => $form->createView(),
            ]);
    } 
    


     /**
     * @Route("/news/update/{id}", methods={"GET", "POST"}, name="news_update")
     */
    public function updateNews(Request $request, $id) {

        $news = new News();
        $news = $this->getDoctrine()->getRepository
       (News::class)->find($id);

        $form = $this->createFormBuilder($news)
        ->add('name', TextType::class)
        ->add('date', DateType::class)
        ->add('description', TextType::class)
        ->add('society', EntityType::class, array(
            'class'=>'App\Entity\Society',
            'choice_label'=>'type',
            'expanded'=>false,
            'multiple'=>false
        ))
        ->add('save', SubmitType::class, ['label' => 'Modifier'])
        ->getForm();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->flush();
        
                return $this->redirectToRoute('news_list');
            }

            return $this->render('news/update.html.twig', [
                'form' => $form->createView(),
            ]);
    }


   /**
     * @Route("/news/{id}", name="news_show")
     */ 
    public function showNews($id) {
        $news = $this->getDoctrine()->getRepository
        (News::class)->find($id);
 
        return $this->render('news/show.html.twig', array 
        ('news' => $news));
     }
    

    /**
     * @Route("/news/delete/{id}", methods={"DELETE"}, name="news_delete")
     * 
     */ 

    public function deleteNews(Request $request, $id){
    $news = $this->getDoctrine()-> getRepository(News::class)->find($id);
    
    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->remove($news);
    $entityManager->flush();

    $response = new Response();
    $response->send();

    }
}
