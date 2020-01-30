<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity;
use App\Entity\Society;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\HttpFoundation\Request;



class SocietyController extends AbstractController
{
    /**
     * @Route("/society", name="society")
     */
    public function addSociety(Request $request) {

        $society = new Society();
        $society->setPhone('0214256309');
        $society->setName('Securite sociale');
        $society->setType('Administration locale');
        $society->setWebsite('www.ameli.fr');

        $form = $this->createFormBuilder($society)
            ->add('phone', NumberType::class)
            ->add('name', TextType::class)
            ->add('type', TextType::class)
            ->add('website', TextType::class)
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
        
                return $this->redirectToRoute('contact');
            }

            return $this->render('society/new.html.twig', [
                'form' => $form->createView(),
            ]);
    }


    public function showSociety($id): Response 

    {
       $society = $this->getDoctrine()
       ->getRepository(Society::class)
       ->find($id);

       if(!$society) {
           throw $this->createNotFoundException(
            'No product found for id'.$id
           );
       }

       return new Response('Check out this society: '.$society->getName());
      
    }
    


    public function updateSociety($id)
    {
    $entityManager = $this->getDoctrine()->getManager();
    $society = $entityManager->getRepository(Society::class)->find($id);

    if (!$society) {
        throw $this->createNotFoundException(
            'No product found for id '.$id
        );
    }

    $society->setPhone('New society phone!');
    $society->setName('New society name!');
    $society->setType('New society type!');
    $society->setWebsite('New society website!');
    $entityManager->flush();

    return $this->redirectToRoute('updateSociety', [
        'id' => $society->getId()
    ]);
}

    public function removeSociety(): Response 

    {
    $entityManager = $this->getDoctrine()->getManager();
    $society = $entityManager->getRepository(Society::class)->find($id);
    
    if (!$society) {
        throw $this->createNotFoundException(
            'No product found for id '.$id
        );
    }

    $society->setPhone('New society phone!');
    $society->setName('New society name!');
    $society->setType('New society type!');
    $society->setWebsite('New society website!');
    $entityManager->remove($product);
    $entityManager->flush();
    
    }
}

