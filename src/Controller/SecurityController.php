<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig',[
        'last_username' => $lastUsername, 
         'error' => $error,
         'Action_Menu_1' =>"Statistiques",
         'Action_Menu_2' =>"1",
         'Action_Menu_3' =>"1",
         'Action_Menu_4' =>"1",
         'Action_Menu_5' =>"1",
         'Action_Menu_6' =>"1",
         'Link_Action_Menu_1' =>"/stats/show",
         'Link_Action_Menu_2' =>"1",
         'Link_Action_Menu_3' =>"1",
         'Link_Action_Menu_4' =>"1",
         'Link_Action_Menu_5' =>"1",
         'Link_Action_Menu_6' =>"1",
        ]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
    
    #[Route(path: '/accueil', name: 'main')]
    public function acceuil(): Response
    {
        return $this->render('base.html.twig',
        [
            'Action_Menu_1' =>"Statistiques",
            'Action_Menu_2' =>"1",
            'Action_Menu_3' =>"1",
            'Action_Menu_4' =>"1",
            'Action_Menu_5' =>"1",
            'Action_Menu_6' =>"1",
            'Link_Action_Menu_1' =>"/stats/show",
            'Link_Action_Menu_2' =>"1",
            'Link_Action_Menu_3' =>"1",
            'Link_Action_Menu_4' =>"1",
            'Link_Action_Menu_5' =>"1",
            'Link_Action_Menu_6' =>"1",




  
            //'UneStat'=>$UneStat,
          

        ]);
    }
}
