<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class DemoExtension extends AbstractExtension
{
    public function getFilters()
    {
        return array(
            new TwigFilter('customdate', array($this, 'customdateFilter')),
        );
    }

    public function customdateFilter($date)
    { 
        if($date != ""){
            return $date->format('Y-m-d h:m:i');
        }else{
            return "Y-M-D H:M:I";
        }
    }
}
