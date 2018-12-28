<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

use App\Entity\User;
use App\Form\RegistrationType;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    /**
     *@Route("/inscription", name="security_registration")
     */
    public function registration(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder){
        $user=new user();
        $form=$this->createForm(RegistrationType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted()&&$form->isValid()) {

            $hash=$encoder->encodePassword($user, $user->getPassword());

            $user->setPassword($hash);
              //  dump($user);
            $manager->persist($user);

            $manager->flush();

            return $this->redirectToRoute('login');
        }
        return $this->render('security/registration.html.twig', [
            'form'=>$form->createView()]);
    }       

    /**
     *@Route("/connexion", name="login")
     */
    public function login(){
        return $this->render('security/login.html.twig');
    }


    /**
     *@Route("/deconnexion", name="logout")
     */
    public function logout(){}
}
