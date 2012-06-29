<?php
namespace Evercode\Bundle\BannerBundle\Form\Extension\ChoiceList;

use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceListInterface;

class BannerPlace implements ChoiceListInterface
{

    const MAIN_HORIZONTAL = 'Main_horizontal';

    public function getChoices()
    {
        return array(
            self::MAIN_HORIZONTAL => self::MAIN_HORIZONTAL,
        );
    }

}
