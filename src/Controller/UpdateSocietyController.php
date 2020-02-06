<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity;
use App\Entity\Society;
use Symfony\Bundle\FrameworkBundle\Configuration\Method;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\HttpFoundation\Request;

class UpdateSocietyController extends AbstractController
{
    /**
     * @Route("/update/society", name="update_society")
     */
    public function updateSociety($id)
    {
    $entityManager = $this->getDoctrine()->getManager();
    $society = $entityManager->getRepository(Society::class)->find($id);

    if (!$society) {
        throw $this->createNotFoundException(
            'No product found for id '.$id

        );
    }

    $society->setId('id');
    $society->setPhone('New society phone!');
    $society->setName('New society name!');
    $society->setType('New society type!');
    $society->setWebsite('New society website!');
    $entityManager->flush();

    return $this->redirectToRoute('updateSociety', [
        'id' => $society->getId()
    ]);
}

}
