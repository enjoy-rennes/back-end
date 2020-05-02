<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Entity\Society;

class PaymentController extends AbstractController
{
    /**
     * @Route("/payment", name="payment")
     */
    public function index()
    {

        // Set your secret key. Remember to switch to your live secret key in production!
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey('sk_test_haOKf6H4LwTP9db9JRTJXwkH005SlfTLMX');

        // Token is created using Stripe Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $charge = \Stripe\Charge::create([
        'amount' => 999,
        'currency' => "eur",
        'description' => "Example charge",
        'source' => "tok_visa",
        ]);

            return $this->render('payment/index.html.twig', [
            'controller_name' => 'PaymentController',
        ]);
      //  return $this->redirectToRoute('society.html.twig');

    }


}
