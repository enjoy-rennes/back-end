<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ShowSocietyController extends AbstractController
{
    /**
     * @Route("/show/society", name="show_society")
     */
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
}
