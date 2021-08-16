<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ApiUserController extends AbstractController
{
    /**
     * @Route("/api/user", name="api_user")
     */
    public function index(): Response
    {


    }


    /**
     * @Route("/api/Adduser", name="api_addUser",methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function add(Request $request): Response
    {
        $User = $this->getDoctrine()->getManager();
        $Email = $request->request->get('email');
        $name = $request->request->get('name');
        $password = $request->request->get('password');
        $user = new User();
        $user->setPassword( $password);
        $user->setEmail($Email);
        $user->setName($name);
        $email = [$Email, $password, $name];
        $User->persist($user);
        $User->flush();
        return new JsonResponse('User %s successfully created');

    }
}





