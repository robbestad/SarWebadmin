<?php

namespace Application\Service;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class DrFront implements ServiceLocatorAwareInterface
{

/** @var ServiceLocatorInterface
 *
 * */
    private $services;

    public function __construct($config=""){

	}

	/**
     * @param $config
     * @return string
     *
     * Return a category ID based on input string
     */
    public function getDrFront($config2=""){


        $config= $this->getServiceLocator()->get('config');
        $imgHost= $config["drFront"]["imgHost"];
        $ad1 = '
            <div style="margin-bottom:10px;"><img src="/img/static/apollo230.png" /></div>
            <div style="margin-bottom:10px;"><img src="/img/static/sas230.png" /></div>
            <div style="margin-bottom:10px;"><img src="/img/static/norw230.png" /></div>
	    ';
	    #echo $config["drFront"]["htmlFile"];
    	$html = file_get_contents($config["drFront"]["htmlFile"]);
	    $html = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $html);
	    $html = preg_replace('/(<[^>]+) width=".*?"/i', '$1', $html);
	    $html = preg_replace('/(<[^>]+) height=".*?"/i', '$1', $html);
	    $html = preg_replace('|<div class="clearer"></div>|', '', $html);
	    /*
	    * TODO: THIS SHOUL NOT RUN IN PROD
	    * comment: this is done so people can run this locally in development
		*/
	    $html = preg_replace('|src="(/[^"]+)"|', 'src="'.$imgHost.'$1"', $html);
	    $html = preg_replace('/{ad1}/', $ad1, $html);

        return $html;
    }



    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->services = $serviceLocator;
    }

    public function getServiceLocator()
    {
        return $this->services;
    }


}
