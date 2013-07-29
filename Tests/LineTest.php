<?php

class Tests_LineTest extends PHPUnit_Framework_TestCase
{
    //  {{{ setUp()

    protected function setUp()
    {
        //  Point1 defined by 1,1 coordinates
        $point1 = new Point(1, 1);
        //  Point1 defined by 2,2 coordinates
        $point2 = new Point(2, 2);

        $this->_sut = new Line($point1, $point2);
    }

    //  }}}
    //  {{{ pointsProvider()

    public function pointsProvider()
    {
        return array(
            array(3,2, 9,4, 6,1, 8,5),
            array(2,7, 6,9, 1,5, 2,7),
            array(2,7, 6,9, 3,9, 5,7),
            array(2,7, 6,9, 6,9, 6,10),
            array(2,7, 6,9, 6,9, 7,8),
            array(6,6, 10,6, 7,7, 7,5),
            array(6,6, 10,6, 9,7, 8,5),
            array(3,4, 7,2, 3,4, 4,5),
            array(3,4, 7,2, 4,2, 6,4),
            array(3,4, 7,2, 6,1, 7,2),
            array(9,5, 9,1, 8,2, 10,2),
            array(9,5, 9,1, 8,4, 9,3),
        );
    }

    //  }}}
    //  {{{ objectInstanceOfShouldBeLine()

    /**
     * @test
     */
    public function objectInstanceOfShouldBeLine()
    {
        $this->assertInstanceOf('Line', $this->_sut);
    }

    //  }}}
    //  {{{ getPoint1ShouldReturnPoint1()

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

    //  }}}
    //  {{{ getPoint2ShouldReturnPoint2()
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

    //  }}}
    //  {{{ intersectShouldCalculateIntersectionOfCircle()

    /**
     * @test
     */
    public function intersectShouldCalculateIntersectionOfCircle()
    {
        $point  = new Point(1, 1);
        $circle = new Circle($point, 5);

        $point1 = new Point(3, 5);
        $point2 = new Point(7, 10);
        $line   = new Line($point1, $point2);

        $this->assertTrue($line->intersect($circle));
    }

    //  }}}
    //  {{{ intersectShouldNotCalculateIntersectionOfCircle()

    /**
     * @test
     */
    public function intersectShouldNotCalculateIntersectionOfCircle()
    {
        $point  = new Point(1, 1);
        $circle = new Circle($point, 4);

        $point1 = new Point(3, 5);
        $point2 = new Point(7, 10);
        $line   = new Line($point1, $point2);

        $this->assertFalse($line->intersect($circle));
    }

    //  }}}
    //  {{{ intersectShouldCalculateIntersectionOfLine()

    /**
     * @test
     * @dataProvider pointsProvider
     */
    public function intersectShouldCalculateIntersectionOfLine(
        $x1, $y1, // point 1
        $x2, $y2, // point 2
        $x3, $y3, // point 3
        $x4, $y4  // point 4
    ) {
        $pointA1 = new Point($x1, $y1);
        $pointA2 = new Point($x2, $y2);
        $lineA   = new Line($pointA1, $pointA2);

        $pointB1 = new Point($x3, $y3);
        $pointB2 = new Point($x4, $y4);
        $lineB   = new Line($pointB1, $pointB2);

        $this->assertTrue($lineA->intersect($lineB));
    }

    //  }}}
    //  {{{ intersectShouldNotCalculateIntersectionOfLine()

    /**
     * @test
     */
    public function intersectShouldNotCalculateIntersectionOfLine()
    {
        $pointA1 = new Point(2, 7);
        $pointA2 = new Point(5, 8);
        $lineA   = new Line($pointA1, $pointA2);

        $pointB1 = new Point(4, 6);
        $pointB2 = new Point(6, 7);
        $lineB   = new Line($pointB1, $pointB2);

        $this->assertFalse($lineA->intersect($lineB));
    }

    //  }}}
}
