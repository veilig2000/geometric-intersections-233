<?php

class Tests_PointTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function getXShouldReturnXCoordinate()
    {
        $point = new Point(2, 4);
        $this->assertEquals(2, $point->getX());
    }

    /**
     * @test
     */
    public function getYShouldReturnYCoordinate()
    {
        $point = new Point(2, 4);
        $this->assertEquals(4, $point->getY());
    }
}
