<?php

class Tests_PointTest extends PHPUnit_Framework_TestCase
{
    //  {{{ getXShouldReturnXCoordinate()

    /**
     * @test
     */
    public function getXShouldReturnXCoordinate()
    {
        $point = new Point(2, 4);
        $this->assertEquals(2, $point->getX());
    }

    //  }}}
    //  {{{ getYShouldReturnYCoordinate()

    /**
     * @test
     */
    public function getYShouldReturnYCoordinate()
    {
        $point = new Point(2, 4);
        $this->assertEquals(4, $point->getY());
    }

    //  }}}
    //  {{{ getDistanceShouldReturnDistanceBetweenPoints()

    /**
     * @test
     */
    public function getDistanceShouldReturnDistanceBetweenPoints()
    {
        $point1 = new Point(1, 1);
        $point2 = new Point(1, 2);

        $this->assertEquals(1, $point1->getDistance($point2));
    }

    //  }}}
}
