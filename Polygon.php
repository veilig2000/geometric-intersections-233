<?php

class Polygon
{
    /**
     * Points Collection
     * @var Point_Collection
     * @access private
     */
    private $_points;

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
    }
}
