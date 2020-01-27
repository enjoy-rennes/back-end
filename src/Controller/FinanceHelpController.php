<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FinanceHelpController extends AbstractController
{
    /**
     * @Route("/finance/help", name="finance_help")
     */
    public function index()
    {
        return $this->render('finance_help/index.html.twig', [
            'controller_name' => 'FinanceHelpController',
        ]);
    }
}
