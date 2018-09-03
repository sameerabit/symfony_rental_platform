<?php
/**
 * Created by PhpStorm.
 * User: sameera
 * Date: 6/16/18
 * Time: 1:11 AM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends Controller
{

    public function indexAction(Request $request)
    {
        $result = $this->getDoctrine()
            ->getRepository(Category::class)->getAllCategories();
//        if ($request->isXmlHttpRequest()) {
            return $this->json($result);
//        }
//        return $this->render('application/ad/ad_list.html.twig', array(
//            'ads' => $result
//        ));
    }

}