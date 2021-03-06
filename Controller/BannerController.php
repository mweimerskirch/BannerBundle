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
    public function topAction($place)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $entity = $em->getRepository('EvercodeBannerBundle:Banner')->findOneRandom($place);

        return array(
            'entity' => $entity,
        );
    }

    /**
     * @Template()
     */
    public function sidebarAction($place)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $entity = $em->getRepository('EvercodeBannerBundle:Banner')->findOneRandom($place);

        return array(
            'entity' => $entity,
        );
    }
}
