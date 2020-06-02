<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 06/06/18
 * Time: 00:47
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Ad;
use AppBundle\Entity\Photo;
use AppBundle\Entity\Photos;
use AppBundle\Forms\ImageUploadFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ImageUploaderController extends Controller
{
    public function viewFormAction($adId)
    {
        $photo = new Photo();
        $this->getDoctrine()
            ->getRepository(Ad::class)->find($adId);
        $photo->setAd($adId);
        $form = $this->createForm(ImageUploadFormType::class,$photo, array(
            'action' => $this->generateUrl('saveImages'),
        ));
        return $this->render('application/ad/photo_upload.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    public function saveAction(Request $request){
        $photo = new Photo();
        $form = $this->createForm(ImageUploadFormType::class,$photo);
        $form->handleRequest($request);
        $adPhoto = $form->getData();
        $dir = __DIR__ . "/../../../web/images/ads/";
        $adPhoto->getUrl()->move($dir,$adPhoto->getUrl()->getClientOriginalName());
        $photo->setUrl($adPhoto->getUrl()->getClientOriginalName());
        if ($form->isSubmitted() && $form->isValid()) {
            $ad = $this->getDoctrine()
                ->getRepository(Ad::class)->find($adPhoto->getAd());
            $photo->setAd($ad);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($photo);
            $entityManager->flush();
            return $this->redirectToRoute('ads');
        }
    }

}