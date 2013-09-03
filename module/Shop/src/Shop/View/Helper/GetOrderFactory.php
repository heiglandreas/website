<?php
/**
 * Website Zend\Together
 *
 * @package    Shop
 * @author     Ralf Eggert <r.eggert@travello.de>
 * * @link       http://www.zf-together.com
 */

/**
 * namespace definition and usage
 */
namespace Shop\View\Helper;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Generates the get order view helper object
 * 
 * @package    Shop
 */
class GetOrderFactory implements FactoryInterface
{
    /**
     * Create Service Factory
     * 
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sm      = $serviceLocator->getServiceLocator();
        $service = $sm->get('Shop\Service\Order');
        $helper  = new GetOrder($service);
        return $helper;
    }
}
