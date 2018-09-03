<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Ad;
use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    public function indexAction(Request $request){
        $ads = null;
        if(is_null($request->get('user'))){
            return $this->redirectToRoute('homepage');
        }
        $filters['user'] = $request->get('user');
        $user = $this->getDoctrine()->getRepository(User::class)->find($filters['user']);
        $adsQuery = $this->getDoctrine()
            ->getRepository(Ad::class)
            ->getFilteredAds($filters,false);
        $paginator  = $this->get('knp_paginator');
        $ads= $paginator->paginate(
            $adsQuery,
            $request->query->getInt('page', 1),
            5
        );
        return $this->render('application/user/user.html.twig', array(
            'ads' => $ads,
            'user'=> $user
        ));
    }
}