<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ConditionController extends AbstractController
{
    /**
     * @Route("/condition", name="condition")
     */
    public function index()
    {
        return $this->render('condition/index.html.twig', [
            'controller_name' => 'ConditionController',
        ]);
    }
}
