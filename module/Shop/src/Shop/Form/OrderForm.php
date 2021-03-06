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
namespace Shop\Form;

use Zend\Form\Element\Csrf;
use Zend\Form\Element\File;
use Zend\Form\Element\Hidden;
use Zend\Form\Element\MultiCheckbox;
use Zend\Form\Element\Select;
use Zend\Form\Element\Text;
use Zend\Form\Element\Textarea;
use Zend\Form\Element\Submit;
use Zend\Form\Form;
use Zend\Form\FormInterface;

/**
 * Shop Form
 * 
 * @package    Shop
 */
class OrderForm extends Form implements OrderFormInterface
{
    /**
     * Add csrf element
     */
    public function addCsrfElement($name = 'tick')
    {
        $element = new Csrf($name);
        $this->add($element);
    }
        
    /**
     * Add id element
     */
    public function addIdElement($name = 'id')
    {
        $element = new Hidden($name);
        $this->add($element);
    }
        
    /**
     * Add status element
     */
    public function addStatusElement($options = array(), $name = 'status')
    {
        $element = new Select($name);
        $element->setLabel('Status');
        $element->setAttribute('class', 'span3');
        $element->setValueOptions($options);
        $this->add($element);
    }
    
    /**
     * Add comments element
     */
    public function addCommentsElement($name = 'comments')
    {
        $element = new Textarea($name);
        $element->setLabel('Bestellhinweise');
        $element->setAttribute('class', 'ckeditor');
        $element->setAttribute('rows', '12');
        $this->add($element);
    }
    
    /**
     * Add submit element
     */
    public function addSubmitElement($name = 'save', $label = 'Bestellen')
    {
        $element = new Submit($name);
        $element->setValue($label);
        $element->setAttribute('class', 'btn');
        $this->add($element);
    }
}
