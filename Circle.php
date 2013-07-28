<?php

class Circle implements ElementInterface
{
    /**
     * Point
     * @var Point
     * @access private
     */
    private $_point;

    /**
     * Radius
     * @var integer
     * @access private
     */
    private $_radius;

    /**
     * Constructor
     *
     * @param Point $point
     * @param integer radius
     *
     * @return void
     * @access public
     */
    public function __construct(Point $point, $radius)
    {
        $this->_point  = $point;
        $this->_radius = $radius;
    }

    /**
     * Get point
     *
     * @return Point
     * @access public
     */
    public function getPoint()
    {
        return $this->_point;
    }

    /**
     * Get radius
     *
     * @return integer
     * @access public
     */
    public function getRadius()
    {
        return $this->_radius;
    }

    /**
     * Determine if element intersects with new element
     *
     * @param ElementInterface $element
     *
     * @return bool
     * @access public
     */
    public function intersect(ElementInterface $element)
    {
    }
}
