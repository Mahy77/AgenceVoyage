<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DestinationController extends AbstractController
{
    /**
     * @Route("/destination", name="destination")
     */
    public function index()
    {
        $destinations = ['soleil', 'ski', 'campagne'];
        return $this->render('destination/index.html.twig', [
            'controller_name' => 'DestinationController',
            'destinations' => $destinations
        ]);
    }
    /**
     * @Route("/destination/{environement}", name="destination_type")
     */
    public function place($environement){
        $destinations = ['soleil', 'ski', 'campagne'];
        return $this->render('destination/destination_type.html.twig', [
            'environement' => $environement,
            'destinations' => $destinations
        ]);
    }
    
}
