<?php
/**
 * Website Zend\Together
 *
 * @package    Comment
 * @author     Ralf Eggert <r.eggert@travello.de>
 * * @link       http://www.zf-together.com
 */

/**
 * namespace definition and usage
 */
namespace Comment\Entity;

use Zend\Stdlib\ArraySerializableInterface;

/**
 * Comment entity interface
 * 
 * @package    Comment
 */
interface CommentEntityInterface extends ArraySerializableInterface
{
    /**
     * Set id
     * 
     * @param integer $id
     */
    public function setId($id);
    
    /**
     * Get id
     * 
     * @return integer $id
     */
    public function getId();
    
    /**
     * Set cdate
     * 
     * @param string $cdate
     */
    public function setCdate($cdate);
    
    /**
     * Get cdate
     * 
     * @return string $cdate
     */
    public function getCdate();
    
    /**
     * Set status
     * 
     * @param string $status
     */
    public function setStatus($status);
    
    /**
     * Get status
     * 
     * @return string $status
     */
    public function getStatus();
    
    /**
     * Get status name
     * 
     * @return string $status
     */
    public function getStatusName();
    
    /**
     * Get status names
     * 
     * @return array list of stati
     */
    public function getStatusNames();
    
    /**
     * Set url
     * 
     * @param string $url
     */
    public function setUrl($url);
    
    /**
     * Get url
     * 
     * @return string $url
     */
    public function getUrl();

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email);
    
    /**
     * Get email
     *
     * @return string $email
     */
    public function getEmail();
    
    /**
     * Set name
     * 
     * @param string $name
     */
    public function setName($name);
    
    /**
     * Get name
     * 
     * @return string $name
     */
    public function getName();
    
    /**
     * Set message
     * 
     * @param string $message
     */
    public function setMessage($message);
    
    /**
     * Get message
     * 
     * @return string $message
     */
    public function getMessage();
}
