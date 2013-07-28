<?php

class Tests_LineTest extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        //  Point1 defined by 1,1 coordinates
        $point1 = new Point(1, 1);
        //  Point1 defined by 2,2 coordinates
        $point2 = new Point(2, 2);

        $this->_sut = new Line($point1, $point2);
    }

    /**
     * @test
     */
    public function objectInstanceOfShouldBeLine()
    {
        $this->assertInstanceOf('Line', $this->_sut);
    }

    /**
     * @test
     */
    public function getPoint1ShouldReturnPoint1()
    {
        $point = $this->_sut->getPoint1();
        $this->assertInstanceOf('Point', $point);
        $this->assertEquals(1, $point->getX());
        $this->assertEquals(1, $point->getY());
    }

    /**
     * @test
     */
    public function getPoint2ShouldReturnPoint2()
    {
        $point = $this->_sut->getPoint2();
        $this->assertInstanceOf('Point', $point);
        $this->assertEquals(2, $point->getX());
        $this->assertEquals(2, $point->getY());
    }
}
