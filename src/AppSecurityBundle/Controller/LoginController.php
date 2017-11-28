<?php

namespace AppSecurityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use AppSecurityBundle\Entity\User;
use AppSecurityBundle\Repository\UserRepository;

class LoginController extends Controller
{
    const USERNAME_FIELD_NAME = "username";
    const PASSWORD_FIELD_NAME = "password";
    
    /**
     * @Route("/login")
     */
    public function loginAction()
    {
        return $this->render('AppSecurityBundle:Login:login.html.twig', array('username_field' => LoginController::USERNAME_FIELD_NAME, 'pass_field' => LoginController::PASSWORD_FIELD_NAME));
    }
    
    /**
     * @Route("/validate_login", name="validate_login")
     * @Method({"POST"})
     */
    public function validateLoginAction(Request $request)
    {
        $username = $request->get(LoginController::USERNAME_FIELD_NAME);
        $pass = $request->get(LoginController::PASSWORD_FIELD_NAME);
        
        $doctrine = $this->getDoctrine();
        $rep = $doctrine->getRepository(User::class);
        $userObject = $rep->loadUserByUsername($username);
        $validPass = false;
        if($userObject != null){
            $encoder = $this->container->get('security.password_encoder');
            $validPass = $encoder->isPasswordValid($userObject, $pass);
        }
        
        //echo "--> $users";
        if($userObject == null || !$validPass){
            return $this->render('AppSecurityBundle:Login:login.html.twig', array('message' => 'Usuario y/o contraseña invalido.', 'username_field' => LoginController::USERNAME_FIELD_NAME, 'pass_field' => LoginController::PASSWORD_FIELD_NAME));
        }
        
    }
    
/**
 * @Route("/registerdumpuser")
 */    
    public function registerDumpUserAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $user = new User();
        $plainPassword = '123456';
        $encoder = $this->container->get('security.password_encoder');
        $encoded = $encoder->encodePassword($user, $plainPassword);

        $user->setPassword($encoded);
        $user->setIsActive(true);
        $user->setUsername("admin");
        $user->setEmail("admin@ilicor.com");
        
        $business = $this->getDoctrine()
        ->getRepository(\BusinessStockBundle\Entity\BusinessStore::class)
        ->find(1);
        
        $user->setIdBusinessOwner($business);
        
        $em->persist($user);
        $em->flush();
        
        return new Response('Saved new user with id '.$user->getId());
        
    }
    
}
