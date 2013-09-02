<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $parser = $this->getServiceLocator()->get('Application\Service\MarkdownWrapper');
        $content = $parser->transform($this->getEvent()->getRouteMatch());
        return array('content' => $content);
    }
}
