<?php

class Tests_CircleTest extends PHPUnit_Framework_TestCase
{
    //  {{{ setUp()

    protected function setUp()
    {
        //  Point1 defined by 1,1 coordinates
        $point1 = new Point(1, 1);

        $this->_sut = new Circle($point1, 5);
    }

    //  }}}
    //  {{{ objectInstanceOfShouldBeCircle()

    /**
     * @test
     */
    public function objectInstanceOfShouldBeCircle()
    {
        $this->assertInstanceOf('Circle', $this->_sut);
    }

    //  }}}
    //  {{{ getPointShouldReturnPoint()

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

    //  }}}
    //  {{{ getRadiusShouldReturnRadiusValue()

    /**
     * @test
     */
    public function getRadiusShouldReturnRadiusValue()
    {
        $this->assertEquals(5, $this->_sut->getRadius());
    }

    //  }}}
    //  {{{ intersectShouldCalculateIntersectionOfLine()

    /**
     * @test
     */
    public function intersectShouldCalculateIntersectionOfLine()
    {
        $point  = new Point(1, 1);
        $circle = new Circle($point, 5);

        $point1 = new Point(3, 5);
        $point2 = new Point(7, 10);
        $line   = new Line($point1, $point2);

        $this->assertTrue($circle->intersect($line));
    }

    //  }}}
    //  {{{ intersectShouldNotCalculateIntersectionOfLine()

    /**
     * @test
     */
    public function intersectShouldNotCalculateIntersectionOfLine()
    {
        $point  = new Point(1, 1);
        $circle = new Circle($point, 4);

        $point1 = new Point(3, 5);
        $point2 = new Point(7, 10);
        $line   = new Line($point1, $point2);

        $this->assertFalse($circle->intersect($line));
    }

    //  }}}
    //  {{{ intersectShouldCalculateIntersectionOfCircle()

    /**
     * @test
     */
    public function intersectShouldCalculateIntersectionOfCircle()
    {
        $point1  = new Point(-4, 1);
        $circle1 = new Circle($point1, 3);

        $point2  = new Point(4, 1);
        $circle2 = new Circle($point2, 3);

        $this->assertFalse($circle1->intersect($circle2));
    }

    //  }}}
    //  {{{ intersectShouldNotCalculateIntersectionOfCircle()

    /**
     * @test
     */
    public function intersectShouldNotCalculateIntersectionOfCircle()
    {
        $point1  = new Point(-4, -5);
        $circle1 = new Circle($point1, 5);

        $point2  = new Point(4, -5);
        $circle2 = new Circle($point2, 5);

        $this->assertTrue($circle1->intersect($circle2));
    }

    //  }}}
}
