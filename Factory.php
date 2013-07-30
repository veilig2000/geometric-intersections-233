<?php
class Factory
{
    //  {{{ createPoint()

    /**
     * Create a new Point Object
     *
     * @param integer $x
     * @param integer $y
     *
     * @return Point
     * @access public
     */
    public function createPoint($x, $y)
    {
        return new Point($x, $y);
    }

    //  }}}
    //  {{{ createLine()

    /**
     * Create a new Line object
     *
     * @param Point $p1
     * @param Point $p2
     *
     * @return Line
     * @access public
     */
    public function createLine(Point $p1, Point $p2)
    {
        $line = new Line($p1, $p2);
        $line->setIntersectorFactory(new Line_Intersect_Factory);
        return $line;
    }

    //  }}}
    //  {{{ createCircle()

    /**
     * Create a new Circle object
     *
     * @param Point $point
     * @param integer $radius
     *
     * @return Circle
     * @access public
     */
    public function createCircle(Point $point, $radius)
    {
        $circle = new Circle($point, $radius);
        $circle->setIntersectorFactory(new Circle_Intersect_Factory);
        return $circle;
    }

    //  }}}
    //  {{{ createPolygon()

    /**
     * Create a new Polygon object
     *
     * @param Point_Collection $points
     *
     * @return Polygon
     * @access public
     */
    public function createPolygon(Point_Collection $points)
    {
        $polygon = new Polygon($points);
        $polygon->setIntersectorFactory(new Polygon_Intersect_Factory);
        return $polygon;
    }

    //  }}}
    //  {{{ createPointCollection()

    /**
     * Create a new Point_Collection object
     *
     * @return Point_Collection
     * @access public
     */
    public function createPointCollection()
    {
        return new Point_Collection();
    }

    //  }}}
}
