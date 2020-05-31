<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity;
use App\Entity\Address;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;



class AddressController extends AbstractController
{

    /**
     * @Route("/address_list", methods={"GET"}, name="address_list")
     * 
     */ 
    public function Address() {

        $address= $this->getDoctrine()->getRepository
        (Address::class)->findAll();

        $datas = array();
        foreach ($address as $key => $address) {

            $datas[$key]['id'] = $address->getId();
            $datas[$key]['postalCode'] = $address->getPostalCode();
            $datas[$key]['streetNumber'] = $address->getStreetNumber();
            $datas[$key]['address'] = $address->getAddress();
            $datas[$key]['city'] = $address->getCity();
            $datas[$key]['country'] = $address->getCountry();
            $datas[$key]['name'] = $address->getName();
            $datas[$key]['society'] = $address->getSociety();

 
        }
        return new jsonResponse($datas);
    }

    /**
     * @Route("/address", methods={"GET"}, name="address")
     * 
     */ 
    public function index() {

        $address= $this->getDoctrine()->getRepository
        (Address::class)->findAll();

        return $this->render('address/index.html.twig', array ('address' => $address));
     }
    
    
    /**
     * @Route("/address/add", name="address_add")
     */
    public function addAddress(Request $request) {

        $address = new Address();

        $form = $this->createFormBuilder($address)
            ->add('postalCode', NumberType::class)
            ->add('streetNumber', TextType::class)
            ->add('address', TextType::class)
            ->add('city', TextType::class)
            ->add('country', TextType::class)
            ->add('name', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Ajouter'])
            ->getForm();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $address = $form->getData();
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($address);
                $entityManager->flush();
                return $this->redirectToRoute('address_list');
            }

            return $this->render('address/new.html.twig', [
                'form' => $form->createView(),
            ]);
    }


     /**
     * @Route("/address/update/{id}", methods={"GET", "POST"}, name="address_update")
     */
    public function updateAddress(Request $request, $id) {

        $address = new Address();
        $address = $this->getDoctrine()->getRepository
       (Address::class)->find($id);

            $form = $this->createFormBuilder($address)
            ->add('postalCode', NumberType::class)
            ->add('streetNumber', TextType::class)
            ->add('address', TextType::class)
            ->add('city', TextType::class)
            ->add('country', TextType::class)
            ->add('name', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Modifier'])
            ->getForm();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->flush();
        
                return $this->redirectToRoute('address_list');
            }

            return $this->render('address/update.html.twig', [
                'form' => $form->createView(),
            ]);
    }



    /**
     * @Route("/address/{id}", name="address_show")
     */ 
    public function showAddress($id) {
       $address = $this->getDoctrine()->getRepository
       (Address::class)->find($id);

       return $this->render('address/show.html.twig', array 
       ('address' => $address));
      
    }
    

    /**
     * @Route("/address/delete/{id}", methods={"DELETE"}, name="address_delete")
     * 
     */ 

    public function deleteAddress(Request $request, $id){
    $address = $this->getDoctrine()-> getRepository(Address::class)->find($id);
    
    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->remove($address);
    $entityManager->flush();

    $response = new Response();
    $response->send();

    }
}
