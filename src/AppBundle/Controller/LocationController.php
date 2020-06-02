<?php
/**
 * Created by PhpStorm.
 * User: sameera
 * Date: 6/16/18
 * Time: 2:26 AM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Location;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LocationController extends Controller
{
    public function indexAction(Request $request)
    {
        $result = $this->getDoctrine()
            ->getRepository(Location::class)->getAllLocations();
        return $this->json($result);
    }

    public function getLocationsByDistrictIdAction(Request $request){
        $districtId = $request->get("districtId");
        $locations = $this->getDoctrine()
            ->getRepository(Location::class)->getLocationsByDistrictId($districtId);
        $result = $this->json($locations);
        return $result;
    }
}