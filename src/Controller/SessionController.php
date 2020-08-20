<?php

namespace App\Controller;

use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SessionController extends AbstractController
{
    /**
     * @Route("/session/add", name="session")
     */
    public function addSession(Request $request)
    {
        $session = $request->getSession();
        $session->set('firstname', 'Michael');   
        $session->set('lastname', 'Jackson');

        return $this->render('session/index.html.twig', [
            'controller_name' => 'SessionController',
        ]);
    }
    /**
     * @Route("/session/display", name="display_session")
     */
    public function display(Request $request){
            $session = $request->getSession();
            $firstname = $session->get('firstname');
            $lastname = $session->get('lastname');
        
            return $this->render('session/display.html.twig', [
            'firstname' => $firstname,
            'lastname' => $lastname,
            ]);
    }
    /**
     * @Route("/session/remove", name="remove_session")
     */
    public Function remove(Request $request){
        $session = $request->getSession();
        $session->clear();
        return $this->render('session/remove.html.twig');
    }
}
