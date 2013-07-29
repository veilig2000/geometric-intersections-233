<?php

class Circle implements ElementInterface
{
    //  {{{ properties

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

    //  }}}
    //  {{{ __construct()

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

    //  }}}
    //  {{{ getPoint()

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

    //  }}}
    //  {{{ getRadius()

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

    //  }}}
    //  {{{ intersect()

    /**
     * Determine if element intersects with another element
     *
     * @param ElementInterface $element
     *
     * @return bool
     * @access public
     */
    public function intersect(ElementInterface $element)
    {
        if ('Line' == get_class($element)) {
            $p1 = $element->getPoint1();
            $p2 = $element->getPoint2();
            $c  = $this->_point;

            $point1Distance = $this->_point->getDistance($p1);
            $point2Distance = $this->_point->getDistance($p2);

            $minDistance = min($point1Distance, $point2Distance);

            return $this->_radius >= $minDistance;
        } elseif ('Circle' == get_class($element)) {
            $point1 = $this->getPoint();
            $point2 = $element->getPoint();

            $distance = $point1->getDistance($point2);

            return ($this->getRadius() + $element->getRadius()) >= $distance;
        }
    }

    //  }}}
}
