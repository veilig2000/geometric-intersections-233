<?php

class Tests_CircleTest extends Tests_TestAbstract
{
    //  {{{ setUp()

    protected function setUp()
    {
        $factory = $this->_getFactory();
        //  Point1 defined by 1,1 coordinates
        $point1 = $factory->createPoint(1, 1);

        $this->_sut = $factory->createCircle($point1, 5);
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
    //  {{{ intersectShouldCalculateCircleIntersectionOfLine()

    /**
     * @test
     */
    public function intersectShouldCalculateCircleIntersectionOfLine()
    {
        $factory = $this->_getFactory();
        $point  = $factory->createPoint(1, 1);
        $circle = $factory->createCircle($point, 5);

        $point1 = $factory->createPoint(3, 5);
        $point2 = $factory->createPoint(7, 10);
        $line   = $factory->createLine($point1, $point2);

        $this->assertTrue($circle->intersect($line));
    }

    //  }}}
    //  {{{ intersectShouldNotCalculateCircleIntersectionOfLine()

    /**
     * @test
     */
    public function intersectShouldNotCalculateCircleIntersectionOfLine()
    {
        $factory = $this->_getFactory();
        $point  = $factory->createPoint(1, 1);
        $circle = $factory->createCircle($point, 4);

        $point1 = $factory->createPoint(3, 5);
        $point2 = $factory->createPoint(7, 10);
        $line   = $factory->createLine($point1, $point2);

        $this->assertFalse($circle->intersect($line));
    }

    //  }}}
    //  {{{ intersectShouldCalculateCircleIntersectionOfCircle()

    /**
     * @test
     */
    public function intersectShouldCalculateCircleIntersectionOfCircle()
    {
        $factory = $this->_getFactory();
        $point1  = $factory->createPoint(-4, 1);
        $circle1 = $factory->createCircle($point1, 3);

        $point2  = $factory->createPoint(4, 1);
        $circle2 = $factory->createCircle($point2, 3);

        $this->assertFalse($circle1->intersect($circle2));
    }

    //  }}}
    //  {{{ intersectShouldNotCalculateCircleIntersectionOfCircle()

    /**
     * @test
     */
    public function intersectShouldNotCalculateCircleIntersectionOfCircle()
    {
        $factory = $this->_getFactory();
        $point1  = $factory->createPoint(-4, -5);
        $circle1 = $factory->createCircle($point1, 5);

        $point2  = $factory->createPoint(4, -5);
        $circle2 = $factory->createCircle($point2, 5);

        $this->assertTrue($circle1->intersect($circle2));
    }

    //  }}}
    //  {{{ intersectShouldCalculateCircleIntersectionOfPolygon()

    /**
     * @test
     */
    public function intersectShouldCalculateCircleIntersectionOfPolygon()
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
        $pointD = $factory->createPoint(5, 7);
        $circle = $factory->createCircle($pointD, 5);

        $this->assertTrue($circle->intersect($polygon));
    }

    //  }}}
}
