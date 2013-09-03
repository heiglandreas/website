<?php
/**
 * Website Zend\Together
 *
 * @package    Pizza
 * @author     Ralf Eggert <r.eggert@travello.de>
 * * @link       http://www.zf-together.com
 */

/**
 * namespace definition and usage
 */
namespace Pizza\Entity;

/**
 * Topping entity
 * 
 * @package    Pizza
 */
class ToppingEntity implements ToppingEntityInterface
{
    protected $id;
    protected $name;
    protected $costs;
    
    /**
     * Set id
     * 
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    
    /**
     * Get id
     * 
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Set name
     * 
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    
    /**
     * Get name
     * 
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Set costs
     * 
     * @param float $costs
     */
    public function setCosts($costs)
    {
        $this->costs = $costs;
    }
    
    /**
     * Get costs
     * 
     * @return float $costs
     */
    public function getCosts()
    {
        return round($this->costs, 2);
    }
    
    /**
     * Exchange internal values from provided array
     *
     * @param  array $array
     * @return void
     */
    public function exchangeArray(array $array)
    {
        foreach ($array as $key => $value) {
            if (empty($value)) {
                continue;
            }
            $method = 'set' . ucfirst($key);
            if (!method_exists($this, $method)) {
                continue;
            }
            $this->$method($value);
        }
    }
    
    /**
     * Return an array representation of the object
     *
     * @return array
     */
    public function getArrayCopy()
    {
        return array(
            'id'    => $this->getId(),
            'name'  => $this->getName(),
            'costs' => $this->getCosts(),
        );
    }
}
