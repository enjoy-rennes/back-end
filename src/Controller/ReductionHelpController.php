<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ReductionHelpController extends AbstractController
{
    /**
     * @Route("/reduction/help", name="reduction_help")
     */
    public function index()
    {
        return $this->render('reduction_help/index.html.twig', [
            'controller_name' => 'ReductionHelpController',
        ]);
    }
}
