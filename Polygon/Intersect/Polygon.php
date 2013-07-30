<?php
class Polygon_Intersect_Polygon implements IntersectInterface
{
    //  {{{ properties

    private $_polygon1;
    private $_polygon2;

    //  }}}
    //  {{{ __construct()

    /**
     * Constructor
     *
     * @param Polygon $polygon1
     * @param Polygon $polygon2
     *
     * @return bool
     * @access public
     */
    public function __construct(Polygon $polygon1, Polygon $polygon2)
    {
        $this->_polygon1 = $polygon1;
        $this->_polygon2 = $polygon2;
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
        $p1Lines = $this->_polygon1->getLines(new Factory);
        $p2Lines = $this->_polygon2->getLines(new Factory);
        foreach ($p1Lines as $p1Line) {
            foreach ($p2Lines as $p2Line) {
                if ($p1Line->intersect($p2Line)) {
                    return true;
                }
            }
        }
        return false;
    }

    //  }}}
}
