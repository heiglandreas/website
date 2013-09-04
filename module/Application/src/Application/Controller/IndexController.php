<?php

namespace Application\Controller;

use Application\Service\Markdown\WrapH2InDiv;
use Application\Service\Markdown\WrapPage;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Service\TocProcessor;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $parser = $this->getServiceLocator()->get('Application\Service\MarkdownWrapper');
        $parser->addPostProcessor(new WrapPage())
               ->addPostProcessor(new WrapH2InDiv());
        $tocParser = $this->getServiceLocator()->get('tocParser');
        $tocParser->addProcessor(new TocProcessor());
        $content = $parser->transform($this->getEvent()->getRouteMatch(), $this->getServiceLocator()->get('translator'));
        $tocParser->parse($content, $this->getServiceLocator()->get('Navigation'));
        return array('content' => $content);
    }
}
