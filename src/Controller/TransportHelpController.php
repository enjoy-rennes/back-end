<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TransportHelpController extends AbstractController
{
    /**
     * @Route("/transport/help", name="transport_help")
     */
    public function index()
    {
        return $this->render('transport_help/index.html.twig', [
            'controller_name' => 'TransportHelpController',
        ]);
    }
}
