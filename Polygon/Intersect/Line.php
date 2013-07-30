<?php
class Polygon_Intersect_Line implements IntersectInterface
{
    //  {{{ properties

    private $_polygon;
    private $_line;

    //  }}}
    //  {{{ __construct()

    /**
     * Constructor
     *
     * @param Polygon $polygon
     * @param Line    $line
     *
     * @return bool
     * @access public
     */
    public function __construct(Polygon $polygon, Line $line)
    {
        $this->_polygon = $polygon;
        $this->_line    = $line;
    }

    //  }}}
    //  {{{ intersect

    /**
     * Find if a polygon intersects with a Line
     *
     * @return bool
     * @access public
     */
    public function intersect()
    {
        $lines = $this->_polygon->getLines(new Factory);
        foreach ($lines as $line) {
            if ($line->intersect($this->_line)) {
                return true;
            }
        }
    }

    //  }}}
}
