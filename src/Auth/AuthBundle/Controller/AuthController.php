<?php

namespace Auth\AuthBundle\Controller;

use Proxies\__CG__\Auth\AuthBundle\Entity\Users;
use Symfony\Bridge\Doctrine\Tests\Fixtures\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session;
use Auth\AuthBundle\Modals\Login;

class AuthController extends Controller
{
    public function indexAction()
    {
        return $this->render('AuthAuthBundle:Auth:CreateUser.html.twig');
    }


    public function loggoutAction(Request $request)
    {
        $session = $request->getSession();

        $session->clear();


        return $this->redirectToRoute('prod_auto_prod_auto_index');
    }

    public function createuserAction(Request $request )
    {
            $firstname = $request->get('first_name');
            $lastname = $request->get('last_name');
            $email = $request->get('email');
            $password = $request->get('password');
            $password_confirm = $request->get('password_confirm');
            $salt = md5(date("d.m.Y||h:i"));
            if (preg_match('~^([a-z0-9_\-\.])+@([a-z0-9_\-\.])+\.([a-z0-9])+$~i', $email) && preg_match('#^[aA-zZ0-9\-_]+$#', $password)) {
                if (strlen(trim($email)) < 25 && strlen(trim($email)) > 3) {
                    if (strlen(trim($password)) < 12 && strlen(trim($password)) > 6 && strlen($password) == strlen($password_confirm)) {

                        $user = new Users();
                        $user->setFirstname($firstname);
                        $user->setLastname($lastname);
                        $user->setEmail($email);
                        $user->setSalt($salt);
                        $user->setPassword(sha1( $password));
                        $user->setPasswordConfirm($password_confirm);
                        $em = $this->getDoctrine()->getManager();
                        $em->persist($user);
                        $em->flush();

                        return $this->render('AuthAuthBundle:Auth:Auth.html.twig');
                    }else
                    {
                        echo ('Eror : Passwords do not match');
                    }

                }else{
                    echo ('Eror');
                }

                echo ('Eror');
            }

        return $this->render('AuthAuthBundle:Auth:CreateUser.html.twig');


    }

}