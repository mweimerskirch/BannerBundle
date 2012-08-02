<?php

namespace Evercode\Bundle\BannerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Evercode\Bundle\BannerBundle\Entity\BannerLog;

class BannerController extends Controller
{

    /**
     * @Template()
     */
    public function viewAction($place)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $banner = $em->getRepository('EvercodeBannerBundle:Banner')->findOneRandom($place);

        $query = $em
                ->createQuery('UPDATE EvercodeBannerBundle:BannerLog l SET l.views = l.views+1 WHERE l.banner=:banner')
                ->setParameter('banner', $banner->getId());

        if ( !$query->execute() ) {
            $log = new BannerLog($banner);
            $em->persist($log);
            $em->flush();
        }

        return array(
            'banner' => $banner,
        );
    }

    /**
     * @Route("/banner/redirect/{id}", name="banner_redirect")
     */
    public function clickAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $banner = $em->getRepository('EvercodeBannerBundle:Banner')->find($id);

        $query = $em
                ->createQuery('UPDATE EvercodeBannerBundle:BannerLog l SET l.clicks = l.clicks+1 WHERE l.banner=:banner')
                ->setParameter('banner', $banner->getId());
        $query->execute();

        return new RedirectResponse($banner->getLink());
    }

}
