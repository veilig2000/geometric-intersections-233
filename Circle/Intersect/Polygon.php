<?php
class Circle_Intersect_Polygon implements IntersectInterface
{
    //  {{{ properties

    private $_circle;
    private $_polygon;

    //  }}}
    //  {{{ __construct()

    /**
     * Constructor
     *
     * @param Circle  $circle
     * @param Polygon $polygon
     *
     * @return bool
     * @access public
     */
    public function __construct(Circle $circle, Polygon $polygon)
    {
        $this->_circle  = $circle;
        $this->_polygon = $polygon;
    }

    //  }}}
    //  {{{ intersect

    /**
     * Find if a circle intersects with a polygon
     *
     * @return bool
     * @access public
     */
    public function intersect()
    {
        $lines = $this->_polygon->getLines(new Factory);
        foreach ($lines as $line) {
            if ($line->intersect($this->_circle)) {
                return true;
            }
        }

        return false;
    }

    //  }}}
}
