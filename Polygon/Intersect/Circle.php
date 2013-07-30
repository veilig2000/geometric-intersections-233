<?php
class Polygon_Intersect_Circle implements IntersectInterface
{
    //  {{{ properties

    private $_polygon;
    private $_circle;

    //  }}}
    //  {{{ __construct()

    /**
     * Constructor
     *
     * @param Polygon $polygon
     * @param Circle  $circle
     *
     * @return bool
     * @access public
     */
    public function __construct(Polygon $polygon, Circle $circle)
    {
        $this->_polygon = $polygon;
        $this->_circle  = $circle;
    }

    //  }}}
    //  {{{ intersect

    /**
     * Find if a polygon intersects with a circle
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
