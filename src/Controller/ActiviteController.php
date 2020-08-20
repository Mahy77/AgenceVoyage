<?php

namespace App\Controller;

use App\Entity\Activite;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ActiviteController extends AbstractController
{
    
    /**
     * @Route("/activite/add", name="add_activite")
     */
    public function addActivite()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $activite = new Activite;
        $activite -> setName('Vélo');
       
        $entityManager->persist($activite);
        $entityManager->flush();
      
        die(dump($activite));
        return $this->redirectToRoute('activite');
    }
         /**
     * @Route("/activite/{activite}", name="activite_detail")
     */
    public function activiteDetail(Activite $activite) {
        return $this->render('activite/detail.html.twig', [
            'activite' => $activite
        ]);

    }
    /**
     * @Route("/activite", name="activite")
     */
    public function index()
    {
        $activites = $this
            ->getDoctrine()
            ->getRepository(Activite::class)
            ->findAll(); 
        return $this->render('activite/index.html.twig', [
            'activites' => $activites
        ]);
    }

    /**
    * @Route("/activite/{activite}/delete", name="activite_delete")
     */
 public function delete(activite $activite){
    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->remove($activite);
    $entityManager->flush();
    return $this->redirect('/activite');
}
}
