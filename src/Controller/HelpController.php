<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity;
use App\Entity\Help;
use App\Entity\FinanceHelp;
use App\Entity\HousingHelp;
use App\Entity\ReductionHelp;
use App\Entity\TransportHelp;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Component\HttpFoundation\Request;


class HelpController extends AbstractController
{
   
    /**
     * @Route("/help_list", methods={"GET"}, name="help_list")
     * 
     */ 
    public function index() {

        $help= $this->getDoctrine()->getRepository
        (Help::class)->findAll();

        return $this->render('help/index.html.twig', array ('help' => $help));
     }
    
    
    /**
     * @Route("/help/add", name="help_add")
     */
    public function addHelp(Request $request) {

        $finance_help = new FinanceHelp();
        $housing_help = new HousingHelp();
        $reduction_help = new ReductionHelp();
        $transport_help = new TransportHelp();
    

        $helps = new Help();
        
        $builder->add('constants', ChoiceType::class, [
            'choice_loader' => new CallbackChoiceLoader(function() {
                return StaticClass::getConstants();
            }),
        ]);
        

            return $this->render('help/new.html.twig', [
                'form' => $form->createView(),
            ]);
    }


    //  /**
    //  * @Route("/society/update/{id}", methods={"GET", "POST"}, name="society_update")
    //  */
    // public function updateSociety(Request $request, $id) {

    //     $society = new Society();
    //     $society = $this->getDoctrine()->getRepository
    //    (Society::class)->find($id);
       
    //     //$society->setPhone('');
    //     //$society->setName('');
    //     //$society->setType('');
    //     //$society->setWebsite('');

    //     $form = $this->createFormBuilder($society)
    //         ->add('phone', NumberType::class)
    //         ->add('name', TextType::class)
    //         ->add('type', TextType::class)
    //         ->add('website', TextType::class)
    //         ->add('save', SubmitType::class, ['label' => 'Modfier la société'])
    //         ->getForm();

    //         $form->handleRequest($request);
    //         if ($form->isSubmitted() && $form->isValid()) {
                
    //             $entityManager = $this->getDoctrine()->getManager();
    //             $entityManager->flush();
        
    //             return $this->redirectToRoute('society_list');
    //         }

    //         return $this->render('society/update.html.twig', [
    //             'form' => $form->createView(),
    //         ]);
    // }



    // /**
    //  * @Route("/society/{id}", name="society_show")
    //  */ 
    // public function showSociety($id) {
    //    $society = $this->getDoctrine()->getRepository
    //    (Society::class)->find($id);

    //    return $this->render('society/show.html.twig', array 
    //    ('society' => $society));
      
    // }
    

    // /**
    //  * @Route("/society/delete/{id}", methods={"DELETE"}, name="society_delete")
    //  * 
    //  */ 

    // public function deleteSociety(Request $request, $id){
    // $society = $this->getDoctrine()-> getRepository(Society::class)->find($id);
    
    // $entityManager = $this->getDoctrine()->getManager();
    // $entityManager->remove($society);
    // $entityManager->flush();

    // $response = new Response();
    // $response->send();

   // }
}
