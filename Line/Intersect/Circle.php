<?php
class Line_Intersect_Circle implements IntersectInterface
{
    //  {{{ properties

    private $_line;
    private $_circle;

    //  }}}
    //  {{{ __construct()

    /**
     * Constructor
     *
     * @param Line   $line
     * @param Circle $circle2
     *
     * @return bool
     * @access public
     */
    public function __construct(Line $line, Circle $circle)
    {
        $this->_line   = $line;
        $this->_circle = $circle;
    }

    //  }}}
    //  {{{ intersect()

    /**
     * Find if a line intersects with a circle
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
