<?php

class Polygon extends ElementAbstract implements ElementInterface
{
    //  {{{ properties

    /**
     * Points Collection
     * @var Point_Collection
     * @access private
     */
    private $_points;

    //  }}}
    //  {{{ __construct()

    /**
     * Constructor
     *
     * @param Point_Collection $points
     *
     * @return void
     * @access public
     */
    public function __construct(Point_Collection $points)
    {
        $this->_points = $points;
    }

    //  }}}
    //  {{{ getPoints()

    /**
     * Get the polygon points
     *
     * @return Point_Collection
     * @access public
     */
    public function getPoints()
    {
        return $this->_points;
    }

    //  }}}
    //  {{{ addPoint()

    /**
     * Add a point to the polygon
     *
     * @param Point $point
     *
     * @return $this
     * @access public
     */
    public function addPoint(Point $point)
    {
        $this->_points->add($point);
        return $this;
    }

    //  }}}
    //  {{{ isValid()

    /**
     * Get if the polygon has more than three sides or angles
     *
     * @return bool
     * @access public
     */
    public function isValid()
    {
        return $this->getPoints()->getSize() >= 3;
    }

    //  }}}
    //  {{{ getLines()

    /**
     * Get all the lines in the polygon
     *
     * @param Factory $factory
     *
     * @return array()
     * @access public
     * @throw RuntimeException if Polygon is not valid
     */
    public function getLines(Factory $factory)
    {
        if (!$this->isValid()) {
            throw new RuntimeException('Not a valid Polygon');
        }

        $points = $this->getPoints();
        $points->rewind();

        $lines = array();
        while ($points->hasNext()) {
            $point1 = $points->current();
            $point2 = $points->next()->current();
            $lines[] = $factory->createLine($point1, $point2);
        }

        //  get last point in collection
        $point1 = $points->current();
        //  get first element in collection
        $point2 = $points->rewind()->current();
        $lines[] = $factory->createLine($point1, $point2);

        return $lines;
    }

    //  }}}
}
