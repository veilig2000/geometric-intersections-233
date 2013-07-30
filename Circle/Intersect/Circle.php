<?php
class Circle_Intersect_Circle implements IntersectInterface
{
    //  {{{ properties

    private $_circle1;
    private $_circle2;

    //  }}}
    //  {{{ __construct()

    /**
     * Constructor
     *
     * @param Circle $circle1
     * @param Circle $circle2
     *
     * @return bool
     * @access public
     */
    public function __construct(Circle $circle1, Circle $circle2)
    {
        $this->_circle1 = $circle1;
        $this->_circle2 = $circle2;
    }

    //  }}}
    //  {{{ intersect()

    /**
     * Find if a circle intersects with another circle
     *
     * @return bool
     * @access public
     */
    public function intersect()
    {
        $point1 = $this->_circle1->getPoint();
        $point2 = $this->_circle2->getPoint();

        $distance = $point1->getDistance($point2);

        return ($this->_circle1->getRadius() + $this->_circle2->getRadius()) >= $distance;
    }

    //  }}}
}
