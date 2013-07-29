<?php

class Tests_PolygonTest extends PHPUnit_Framework_TestCase
{
    //  {{{ setUp()

    protected function setUp()
    {
        $collection = new Point_Collection();

        for ($i = 1; $i < 5; ++$i) {
            $point = new Point($i, $i);
            $collection->add($point);
        }

        $this->_sut = new Polygon($collection);
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
        $collectionBefore = $this->_sut->getPoints();
        $beforeSize = $collectionBefore->getSize();

        $point = new Point(6, 6);
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
        $pointA = new Point(0, 4);
        $pointB = new Point(4, 4);
        $pointC = new Point(2, 9);

        $collection = new Point_Collection();
        $collection->add($pointA)
                   ->add($pointB)
                   ->add($pointC);

        $polygon = new Polygon($collection);

        $this->assertTrue($polygon->isValid());
    }

    //  }}}
    //  {{{ isValidShouldReturnFalseForLessThanThreePoints()

    /**
     * @test
     */
    public function isValidShouldReturnFalseForLessThanThreePoints()
    {
        $pointA = new Point(4, 4);
        $pointB = new Point(2, 9);

        $collection = new Point_Collection();
        $collection->add($pointA)
                   ->add($pointB);

        $polygon = new Polygon($collection);

        $this->assertFalse($polygon->isValid());
    }

    //  }}}
    //  {{{ intersectShouldCalculatePolygonIntersectionOfLine()

    /**
     * @test
     */
    public function intersectShouldCalculatePolygonIntersectionOfLine()
    {
        //  Triangle in first quadrant
        $pointA = new Point(3, 6);
        $pointB = new Point(8, 4);
        $pointC = new Point(5, 9);

        $collection = new Point_Collection();
        $collection->add($pointA)
                   ->add($pointB)
                   ->add($pointC);

        $polygon = new Polygon($collection);

        //  Line intersecting triangle
        $pointD = new Point(4, 4);
        $pointE = new Point(5, 7);
        $line   = new Line($pointD, $pointE);

        $this->assertTrue($polygon->intersect($line));
    }

    //  }}}
    //  {{{ intersectShouldCalculatePolygonIntersectionOfLine2()

    /**
     * @test
     */
    public function intersectShouldCalculatePolygonIntersectionOfLine2()
    {
        //  Triangle in first quadrant
        $pointA = new Point(3, 6);
        $pointB = new Point(8, 4);
        $pointC = new Point(5, 9);

        $collection = new Point_Collection();
        $collection->add($pointA)
                   ->add($pointB)
                   ->add($pointC);

        $polygon = new Polygon($collection);

        //  Line intersecting triangle
        $pointD = new Point(2, 9);
        $pointE = new Point(5, 7);
        $line   = new Line($pointD, $pointE);

        $this->assertTrue($polygon->intersect($line));
    }

    //  }}}
    //  {{{ intersectShouldCalculatePolygonIntersectionOfCircle()

    /**
     * @test
     */
    public function intersectShouldCalculatePolygonIntersectionOfCircle()
    {
        //  Triangle in first quadrant
        $pointA = new Point(3, 6);
        $pointB = new Point(8, 4);
        $pointC = new Point(5, 9);

        $collection = new Point_Collection();
        $collection->add($pointA)
                   ->add($pointB)
                   ->add($pointC);

        $polygon = new Polygon($collection);

        //  Line intersecting triangle
        $pointD = new Point(5, 7);
        $circle = new Circle($pointD, 5);

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
        //  Triangle in first quadrant
        $pointA = new Point(3, 6);
        $pointB = new Point(8, 4);

        $collection = new Point_Collection();
        $collection->add($pointA)
                   ->add($pointB);

        $polygon = new Polygon($collection);

        //  Line intersecting triangle
        $pointD = new Point(2, 9);
        $pointE = new Point(5, 7);
        $line   = new Line($pointD, $pointE);

        $polygon->intersect($line);
    }

    //  }}}
}
