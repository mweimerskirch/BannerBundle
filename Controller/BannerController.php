<?php

namespace Evercode\Bundle\BannerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class BannerController extends Controller
{

    /**
     * @Template()
     */
    public function viewAction($place)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $banner = $em->getRepository('EvercodeBannerBundle:Banner')->findOneRandom($place);

        return array(
            'banner' => $banner,
        );
    }

}
