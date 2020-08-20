<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SejourController extends AbstractController
{
    /**
     * @Route("/sejour", name="sejour")
     */
    public function index()
    {
        return $this->render('sejour/index.html.twig', [
            'controller_name' => 'SejourController',
        ]);
    }
    /**
     * @Route("/sejour/{environement}", name="sejour_type")
     */
    public  function duree($environement)
    {
        return $this->render('sejour/sejour_type.html.twig', [
            'environement' => $environement
        ]);
    }
}
