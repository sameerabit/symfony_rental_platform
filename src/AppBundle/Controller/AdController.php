<?php
/**
 * Created by PhpStorm.
 * User: sameera
 * Date: 5/25/18
 * Time: 9:39 PM
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Ad;
use AppBundle\Entity\Category;
use AppBundle\Entity\Location;
use AppBundle\Entity\Photo;
use AppBundle\Entity\SubCategory;
use AppBundle\Forms\AdFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class AdController extends Controller
{

    public function viewFormAction()
    {
        $ad = new Ad();
        for($i=1;$i<=Photo::NUMBER_OF_PHOTOS;$i++){
            $ad->getPhotos()->add( new Photo());
        }
        $form = $this->createForm(AdFormType::class,$ad, array(
            'action' => $this->generateUrl('ad_save'),
        ));
        return $this->render('application/ad/create.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function indexAction(Request $request)
    {
        $isAjax = false;
        $filters = array();
        $mainCategoryId = $request->get("mainCategoryId");
        $categoryId = $request->get("categoryId");
        $locationId = $request->get("locationId");
        $searchQuery = $request->get("term");
        $user = $request->get('user');
        $reset = $request->get("reset");
        if($reset==1){
            $sessionFilters = $this->get('session')->get('filters');
            unset($sessionFilters["locationId"]);
            $this->get('session')->set('filters',$sessionFilters);
        }
        $sessionFilters = $this->get('session')->get('filters');
        if(isset($sessionFilters["mainCategoryId"]) && $sessionFilters["mainCategoryId"]!=null){
            if($categoryId == null && $mainCategoryId != 0){
                $filters['mainCategoryId'] = $sessionFilters["mainCategoryId"];
            }
        }
        if(isset($sessionFilters["categoryId"]) && $sessionFilters["categoryId"]!=null){
            if($mainCategoryId == null){
                $filters['categoryId'] = $sessionFilters["categoryId"];
            }
        }
        if(isset($sessionFilters["locationId"]) && $sessionFilters["locationId"]!=null){
            $filters['locationId'] = $sessionFilters["locationId"];
        }
        if ($categoryId != null) {
            $filters['categoryId'] = $categoryId;
        }
        if ($locationId != null) {
            $filters['locationId'] = $locationId;
        }
        if ($mainCategoryId != null) {
            if($mainCategoryId != 0){
                $filters['mainCategoryId'] = $mainCategoryId;
            }
        }
        if ($searchQuery != null) {
            $filters['searchQuery'] = $searchQuery;
        }
        if($this->getUser() != null && isset($user)){
            $filters['user'] = $this->getUser()->getId();
        }

        $this->get('session')->set('filters',$filters);

        $resetEnabled = false;
        $isALocationSelected = false;
        $selectedLocation = null;

        if(count($filters)>0){
            if(isset($filters['locationId']) > 0){
                $resetEnabled = true;
                $isALocationSelected = true;
                $selectedLocation= $this->getDoctrine()->getRepository(Location::class)
                    ->find($filters['locationId']);
            }
        }
        $paginator  = $this->get('knp_paginator');
        if(isset($filters['mainCategoryId']) && $filters['mainCategoryId'] != null){
            $adsQuery = $this->getDoctrine()
                ->getRepository(Ad::class)->getFilteredAdsByMainCategory($filters);
            $mainCategory = $this->getDoctrine()->getRepository(Category::class)
                ->find($filters['mainCategoryId']);
            $subCategoryList = $mainCategory->getSubCategories();
            $result = $paginator->paginate(
                $adsQuery,
                $request->query->getInt('page', 1),
                10
            );
            return $this->render('application/ad/ad_list.html.twig', array(
                'ads' => $result,
                'selectedCategory' => $mainCategory,
                'backToMainCategoriesEnabled' => true,
                'listData'=> $subCategoryList,
                'active' => '',
                'resetEnabled' => false,
                'isALocationSelected' => $isALocationSelected,
                'selectedLocation' => $selectedLocation,
                'isMainCategorySearch' => true
            ));
        }

        $resultQuery = $this->getDoctrine()
            ->getRepository(Ad::class)
            ->getFilteredAds($filters,$isAjax);


        if(isset($filters['categoryId']) && $filters['categoryId'] != null){
            $category = $this->getDoctrine()->getRepository(SubCategory::class)
                ->find($filters['categoryId']);
            $listData = $category->getCategory()->getSubCategories();
            $active = $filters['categoryId'];
            $selectedMainCategory = $category->getCategory();
            $backToMainCategoriesEnabled = true;
        }

        if(!isset($filters['categoryId'])){
            $listData = $this->getDoctrine()->getRepository(Category::class)->findAll();
            $active = '';
            $selectedMainCategory = "All Categories";
            $backToMainCategoriesEnabled = false;
        }

        $result = $paginator->paginate(
            $resultQuery,
            $request->query->getInt('page', 1),
            10
        );

        return $this->render('application/ad/ad_list.html.twig', array(
            'ads' => $result,
            'resetEnabled' => $resetEnabled,
            'selectedCategory' => $selectedMainCategory,
            'backToMainCategoriesEnabled' => $backToMainCategoriesEnabled,
            'listData' => $listData,
            'active'=>$active,
            'isALocationSelected' => $isALocationSelected,
            'selectedLocation' => $selectedLocation,
            'isMainCategorySearch' => false
        ));
    }

    public function saveAction(Request $request){
        $photos = null;
        $photoUrlArray = array();
        $uniqueId = uniqid();
        if(!empty($request->request->get('ad_form')['id'])){
            $id = $request->request->get('ad_form')['id'];
            /** @var Ad $ad */
            $ad = $this->getDoctrine()->getRepository(Ad::class)->find($id);
            $photos =  $ad->getPhotos();
            foreach ($photos as $photo){
                array_push($photoUrlArray,$photo->getUrl());
            }
        }else{
            $ad = new Ad();
            $images = $request->files->all();
            foreach ($images['ad_form']['photos'] as &$photo){
                $photoObj = new Photo();
                $photoObj->setUrl("");
                $photoObj->setAd($ad);
                $ad->getPhotos()->add($photoObj);
            }
        }
        $form = $this->createForm(AdFormType::class,$ad, array(
            'action' => $this->generateUrl('ad_save'),
        ));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $i=1;
            foreach ($ad->getPhotos() as $key => $photo){
                $dir = __DIR__."/../../../web/images/ads/";
                $url = "img_".$uniqueId.$i.".jpg";
                if(!is_null($photo->getUrl())){
                    $photo->getUrl()->move($dir,$url);
                }else{
                    if(!empty($photoUrlArray)){
                        $url =  $photoUrlArray[$key];
                    }else{
                        $url = "no_image.png";
                    }
                }
                $photo->setUrl($url);
                ++$i;
            }
            $this->getDoctrine()->getRepository(Ad::class)->store($ad,$this->getUser());
            return $this->redirectToRoute('ad_update', array('id' => $ad->getId()));
        }
        return $this->render('application/ad/create.html.twig', array(
            'form'  => $form->createView()
        ));

    }

    public function updateAction(Ad $ad)
    {
        $form = $this->createForm(AdFormType::class, $ad, array(
            'action' => $this->generateUrl('ad_save'),
        ));
        return $this->render('application/ad/create.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function adDetailViewAction(Ad $ad){
        return $this->render('application/ad/ad_detail.html.twig', array(
            'ad' => $ad,
        ));
    }

}