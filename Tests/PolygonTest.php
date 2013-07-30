<?php

class Tests_PolygonTest extends Tests_TestAbstract
{
    //  {{{ setUp()

    protected function setUp()
    {
        $factory = $this->_getFactory();
        $collection = $factory->createPointCollection();

        for ($i = 1; $i < 5; ++$i) {
            $point = $factory->createPoint($i, $i);
            $collection->add($point);
        }

        $this->_sut = $factory->createPolygon($collection);
    }

    //  }}}
    //  {{{ objectInstanceOfShouldBePolygon()

    /**
     * @test
     */
    public function objectInstanceOfShouldBePolygon()
    {
        $this->assertInstanceOf('Polygon', $this->_sut);
    }

    //  }}}
    //  {{{ getPointsShouldReturnPointCollection()

    /**
     * @test
     */
    public function getPointsShouldReturnPointCollection()
    {
        $this->assertInstanceOf('Point_Collection', $this->_sut->getPoints());
    }

    //  }}}
    //  {{{ addPointsShouldAddPointToCollection()

    /**
     * @test
     */
    public function addPointsShouldAddPointToCollection()
    {
        $factory = $this->_getFactory();

        $collectionBefore = $this->_sut->getPoints();
        $beforeSize = $collectionBefore->getSize();

        $point = $factory->createPoint(6, 6);
        $this->_sut->addPoint($point);

        $collectionAfter = $this->_sut->getPoints();
        $afterSize = $collectionAfter->getSize();

        $this->assertEquals(1, $afterSize - $beforeSize);
    }

    //  }}}
    //  {{{ isValidShouldReturnTrueForMoreThanTwoPoints()

    /**
     * @test
     */
    public function isValidShouldReturnTrueForMoreThanTwoPoints()
    {
        $factory = $this->_getFactory();

        $pointA = $factory->createPoint(0, 4);
        $pointB = $factory->createPoint(4, 4);
        $pointC = $factory->createPoint(2, 9);

        $collection = $factory->createPointCollection();
        $collection->add($pointA)
                   ->add($pointB)
                   ->add($pointC);

        $polygon = $factory->createPolygon($collection);

        $this->assertTrue($polygon->isValid());
    }

    //  }}}
    //  {{{ isValidShouldReturnFalseForLessThanThreePoints()

    /**
     * @test
     */
    public function isValidShouldReturnFalseForLessThanThreePoints()
    {
        $factory = $this->_getFactory();

        $pointA = $factory->createPoint(4, 4);
        $pointB = $factory->createPoint(2, 9);

        $collection = $factory->createPointCollection();
        $collection->add($pointA)
                   ->add($pointB);

        $polygon = $factory->createPolygon($collection);

        $this->assertFalse($polygon->isValid());
    }

    //  }}}
    //  {{{ intersectShouldCalculatePolygonIntersectionOfLine()

    /**
     * @test
     */
    public function intersectShouldCalculatePolygonIntersectionOfLine()
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

        $this->assertTrue($polygon->intersect($line));
    }

    //  }}}
    //  {{{ intersectShouldCalculatePolygonIntersectionOfLine2()

    /**
     * @test
     */
    public function intersectShouldCalculatePolygonIntersectionOfLine2()
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

        $this->assertTrue($polygon->intersect($line));
    }

    //  }}}
    //  {{{ intersectShouldCalculatePolygonIntersectionOfCircle()

    /**
     * @test
     */
    public function intersectShouldCalculatePolygonIntersectionOfCircle()
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

        $this->assertTrue($polygon->intersect($circle));
    }

    //  }}}
    //  {{{ intersectShouldThrowExceptionIfInvalidPolygon()

    /**
     * @test
     * @expectedException RuntimeException
     */
    public function intersectShouldThrowExceptionIfInvalidPolygon()
    {
        $factory = $this->_getFactory();
        //  Triangle in first quadrant
        $pointA = $factory->createPoint(3, 6);
        $pointB = $factory->createPoint(8, 4);

        $collection = $factory->createPointCollection();
        $collection->add($pointA)
                   ->add($pointB);

        $polygon = $factory->createPolygon($collection);

        //  Line intersecting triangle
        $pointD = $factory->createPoint(2, 9);
        $pointE = $factory->createPoint(5, 7);
        $line   = $factory->createLine($pointD, $pointE);

        $polygon->intersect($line);
    }

    //  }}}
    //  {{{ intersectShouldCalculatePolygonIntersectionOfPolygon()

    /**
     * @test
     */
    public function intersectShouldCalculatePolygonIntersectionOfPolygon()
    {
        $factory = $this->_getFactory();
        //  Triangle in first quadrant
        $pointA = $factory->createPoint(3, 6);
        $pointB = $factory->createPoint(8, 4);
        $pointC = $factory->createPoint(5, 9);

        $collection1 = $factory->createPointCollection();
        $collection1->add($pointA)
                    ->add($pointB)
                    ->add($pointC);

        $polygon1 = $factory->createPolygon($collection1);

        //  pentagon in first quadrant
        $pointD = $factory->createPoint(2, 9);
        $pointE = $factory->createPoint(5, 7);
        $pointF = $factory->createPoint(4, 4);
        $pointG = $factory->createPoint(0, 4);
        $pointH = $factory->createPoint(-1, 7);

        $collection2 = $factory->createPointCollection();
        $collection2->add($pointD)
                    ->add($pointE)
                    ->add($pointF)
                    ->add($pointG)
                    ->add($pointH);

        $polygon2 = $factory->createPolygon($collection2);

        $this->assertTrue($polygon1->intersect($polygon2));
    }

    //  }}}
    //  {{{ intersectShouldNotCalculatePolygonIntersectionOfPolygon()

    /**
     * @test
     */
    public function intersectShouldNotCalculatePolygonIntersectionOfPolygon()
    {
        $factory = $this->_getFactory();
        //  Triangle in first quadrant
        $pointA = $factory->createPoint(3, 6);
        $pointB = $factory->createPoint(8, 4);
        $pointC = $factory->createPoint(5, 9);

        $collection1 = $factory->createPointCollection();
        $collection1->add($pointA)
                    ->add($pointB)
                    ->add($pointC);

        $polygon1 = $factory->createPolygon($collection1);

        //  pentagon in first quadrant
        $pointD = $factory->createPoint(2, 1);
        $pointE = $factory->createPoint(4, -3);
        $pointF = $factory->createPoint(-2, -6);
        $pointG = $factory->createPoint(-1, -2);
        $pointH = $factory->createPoint(-3, 2);

        $collection2 = $factory->createPointCollection();
        $collection2->add($pointD)
                    ->add($pointE)
                    ->add($pointF)
                    ->add($pointG)
                    ->add($pointH);

        $polygon2 = $factory->createPolygon($collection2);

        $this->assertFalse($polygon1->intersect($polygon2));
    }

    //  }}}
}
