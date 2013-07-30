<?php
class Line_Intersect_Polygon implements IntersectInterface
{
    //  {{{ properties

    private $_line;
    private $_polygon;

    //  }}}
    //  {{{ __construct()

    /**
     * Constructor
     *
     * @param Line    $line
     * @param Polygon $polygon
     *
     * @return bool
     * @access public
     */
    public function __construct(Line $line, Polygon $polygon)
    {
        $this->_line    = $line;
        $this->_polygon = $polygon;
    }

    //  }}}
    //  {{{ intersect

    /**
     * Find if a line intersects with a polygon
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
        return false;
    }

    //  }}}
}
