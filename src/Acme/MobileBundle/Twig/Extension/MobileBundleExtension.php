<?php
# Test/MyBundle/Twig/Extension/MyBundleExtension.php

namespace Acme\MobileBundle\Twig\Extension;

use Symfony\Component\HttpKernel\KernelInterface;

class MobileBundleExtension extends \Twig_Extension
{
    public function __construct()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            'totime' => new \Twig_Function_Method($this, 'toTime'),
            'todate' => new \Twig_Function_Method($this, 'todate'),
            'getdate' => new \Twig_Function_Method($this, 'getdate')
        );
    }
    
    /**
     * Converts a string to time
     * 
     * @param string $string
     * @return int 
     */
    public function toTime ($string,$timestamp)
    {
        return strtotime($string,$timestamp);
    }
    
    public function todate($pattern,$timestamp)
    {
        return date($pattern,$timestamp);
    }
    public function getdate($timestamp)
    {
        return getdate($timestamp);
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'mobile_bundle';
    }
}