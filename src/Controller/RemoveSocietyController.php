<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RemoveSocietyController extends AbstractController
{
    /**
     * @Route("/remove/society", name="remove_society")
     */
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
