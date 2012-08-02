<?php

namespace Evercode\Bundle\BannerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="banners_log")
 * @ORM\Entity()
 */
class BannerLog
{

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Banner", cascade={"all"})
     */
    protected $banner;

    /**
     * @ORM\Column(type="date")
     */
    protected $date;

    /**
     * @ORM\Column(type="integer")
     */
    protected $views;

    /**
     * @ORM\Column(type="integer")
     */
    protected $clicks;

    function __construct($banner)
    {
        $this->banner = $banner;
        $this->date = new \DateTime();
        $this->views = 1;
        $this->clicks = 0;
    }

}
