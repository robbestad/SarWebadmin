<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use ApplicationConfigAwareInterface;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {

    	$html = $this->getServiceLocator()->get('Application\Service\DrFront')->getDrFront();
        return new ViewModel(array(
        	'drFront' => $html,
        	)
        );
    }
}
