<?php
class Circle_Intersect_Line implements IntersectInterface
{
    //  {{{ properties

    private $_circle;
    private $_line;

    //  }}}
    //  {{{ __construct()

    /**
     * Constructor
     *
     * @param Circle $circle
     * @param Line   $line
     *
     * @return bool
     * @access public
     */
    public function __construct(Circle $circle, Line $line)
    {
        $this->_circle = $circle;
        $this->_line   = $line;
    }

    //  }}}
    //  {{{ intersect()

    /**
     * Find if a circle intersects with a line
     *
     * @return bool
     * @access public
     */
    public function intersect()
    {
        $linePoint1 = $this->_line->getPoint1();
        $linePoint2 = $this->_line->getPoint2();

        $circlePoint = $this->_circle->getPoint();

        $point1Distance = $circlePoint->getDistance($linePoint1);
        $point2Distance = $circlePoint->getDistance($linePoint2);

        $minDistance = min($point1Distance, $point2Distance);

        return $this->_circle->getRadius() >= $minDistance;
    }

    //  }}}
}
