<?php

namespace AppBundle\Controller;

use AppBundle\Entity\SubCategory;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SubCategoryController extends Controller
{
    public function getSubCategoryListAction(Request $request){
        $categoryId = $request->get("categoryId");
        $result = $this->getDoctrine()->getRepository(SubCategory::class)
            ->getSubCategoryListByCategoryId($categoryId);
        return $this->json($result);
    }
}