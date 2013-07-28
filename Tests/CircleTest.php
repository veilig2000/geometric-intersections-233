<?php

class Tests_CircleTest extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        //  Point1 defined by 1,1 coordinates
        $point1 = new Point(1, 1);

        $this->_sut = new Circle($point1, 5);
    }

    /**
     * @test
     */
    public function objectInstanceOfShouldBeCircle()
    {
        $this->assertInstanceOf('Circle', $this->_sut);
    }

    /**
     * @test
     */
    public function getPointShouldReturnPoint()
    {
        $point = $this->_sut->getPoint();
        $this->assertInstanceOf('Point', $point);
        $this->assertEquals(1, $point->getX());
        $this->assertEquals(1, $point->getY());
    }

    /**
     * @test
     */
    public function getRadiusShouldReturnRadiusValue()
    {
        $this->assertEquals(5, $this->_sut->getRadius());
    }
}
