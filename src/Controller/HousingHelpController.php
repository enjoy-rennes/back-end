<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HousingHelpController extends AbstractController
{
    /**
     * @Route("/housing/help", name="housing_help")
     */
    public function index()
    {
        return $this->render('housing_help/index.html.twig', [
            'controller_name' => 'HousingHelpController',
        ]);
    }
}
