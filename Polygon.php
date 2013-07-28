<?php

class Polygon
{
    private $_points;

    public function __construct(Point_Collection $points)
    {
        $this->_points = $points;
    }

    public function getPoints()
    {
        return $this->_points;
    }

    public function addPoint(Point $point)
    {
        $this->_points->add($point);
    }
}
