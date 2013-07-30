<?php

class LineTest extends Tests_TestAbstract
{
    //  {{{ setUp()

    protected function setUp()
    {
        $factory = $this->_getFactory();
        //  Point1 defined by 1,1 coordinates
        $point1 = $factory->createPoint(1, 1);
        //  Point1 defined by 2,2 coordinates
        $point2 = $factory->createPoint(2, 2);

        $this->_sut = $factory->createLine($point1, $point2);
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
    //  {{{ intersectShouldCalculateLineIntersectionOfCircle()

    /**
     * @test
     */
    public function intersectShouldCalculateLineIntersectionOfCircle()
    {
        $factory = $this->_getFactory();
        $point  = $factory->createPoint(1, 1);
        $circle = $factory->createCircle($point, 5);

        $point1 = $factory->createPoint(3, 5);
        $point2 = $factory->createPoint(7, 10);
        $line   = $factory->createLine($point1, $point2);

        $this->assertTrue($line->intersect($circle));
    }

    //  }}}
    //  {{{ intersectShouldNotCalculateLineIntersectionOfCircle()

    /**
     * @test
     */
    public function intersectShouldNotCalculateLineIntersectionOfCircle()
    {
        $factory = $this->_getFactory();
        $point  = $factory->createPoint(1, 1);
        $circle = $factory->createCircle($point, 4);

        $point1 = $factory->createPoint(3, 5);
        $point2 = $factory->createPoint(7, 10);
        $line   = $factory->createLine($point1, $point2);

        $this->assertFalse($line->intersect($circle));
    }

    //  }}}
    //  {{{ intersectShouldCalculateLineIntersectionOfLine()

    /**
     * @test
     * @dataProvider pointsProvider
     */
    public function intersectShouldCalculateLineIntersectionOfLine(
        $x1, $y1, // point 1
        $x2, $y2, // point 2
        $x3, $y3, // point 3
        $x4, $y4  // point 4
    ) {
        $factory = $this->_getFactory();
        $pointA1 = $factory->createPoint($x1, $y1);
        $pointA2 = $factory->createPoint($x2, $y2);
        $lineA   = $factory->createLine($pointA1, $pointA2);

        $pointB1 = $factory->createPoint($x3, $y3);
        $pointB2 = $factory->createPoint($x4, $y4);
        $lineB   = $factory->createLine($pointB1, $pointB2);

        $this->assertTrue($lineA->intersect($lineB));
    }

    //  }}}
    //  {{{ intersectShouldNotCalculateLineIntersectionOfLine()

    /**
     * @test
     */
    public function intersectShouldNotCalculateLineIntersectionOfLine()
    {
        $factory = $this->_getFactory();
        $pointA1 = $factory->createPoint(2, 7);
        $pointA2 = $factory->createPoint(5, 8);
        $lineA   = $factory->createLine($pointA1, $pointA2);

        $pointB1 = $factory->createPoint(4, 6);
        $pointB2 = $factory->createPoint(6, 7);
        $lineB   = $factory->createLine($pointB1, $pointB2);

        $this->assertFalse($lineA->intersect($lineB));
    }

    //  }}}
    //  {{{ intersectShouldNotCalculateLineIntersectionOfLine2()

    /**
     * @test
     */
    public function intersectShouldNotCalculateLineIntersectionOfLine2()
    {
        $factory = $this->_getFactory();
        $pointA1 = $factory->createPoint(5, 9);
        $pointA2 = $factory->createPoint(3, 6);
        $lineA   = $factory->createLine($pointA1, $pointA2);

        $pointB1 = $factory->createPoint(-1, -2);
        $pointB2 = $factory->createPoint(-3, 2);
        $lineB   = $factory->createLine($pointB1, $pointB2);

        $this->assertFalse($lineA->intersect($lineB));
    }

    //  }}}
    //  {{{ intersectShouldCalculateLineIntersectionOfPolygon()

    /**
     * @test
     */
    public function intersectShouldCalculateLineIntersectionOfPolygon()
    {
        $factory = $this->_getFactory();
        //  Triangle in first quadrant
        $pointA = $factory->createPoint(3, 6);
        $pointB = $factory->createPoint(8, 4);
        $pointC = $factory->createPoint(5, 9);

        $collection = $factory->createPointCollection();
        $collection->add($pointA)
                   ->add($pointB)
                   ->add($pointC);

        $polygon = $factory->createPolygon($collection);

        //  Line intersecting triangle
        $pointD = $factory->createPoint(4, 4);
        $pointE = $factory->createPoint(5, 7);
        $line   = $factory->createLine($pointD, $pointE);

        $this->assertTrue($line->intersect($polygon));
    }

    //  }}}
    //  {{{ intersectShouldCalculateLineIntersectionOfPolygon2()

    /**
     * @test
     */
    public function intersectShouldCalculateLineIntersectionOfPolygon2()
    {
        $factory = $this->_getFactory();
        //  Triangle in first quadrant
        $pointA = $factory->createPoint(3, 6);
        $pointB = $factory->createPoint(8, 4);
        $pointC = $factory->createPoint(5, 9);

        $collection = $factory->createPointCollection();
        $collection->add($pointA)
                   ->add($pointB)
                   ->add($pointC);

        $polygon = $factory->createPolygon($collection);

        //  Line intersecting triangle
        $pointD = $factory->createPoint(2, 9);
        $pointE = $factory->createPoint(5, 7);
        $line   = $factory->createLine($pointD, $pointE);

        $this->assertTrue($line->intersect($polygon));
    }

    //  }}}
}
