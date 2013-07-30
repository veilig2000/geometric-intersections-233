<?php

class PointTest extends Tests_TestAbstract
{
    //  {{{ getXShouldReturnXCoordinate()

    /**
     * @test
     */
    public function getXShouldReturnXCoordinate()
    {
        $factory = $this->_getFactory();
        $point = $factory->createPoint(2, 4);
        $this->assertEquals(2, $point->getX());
    }

    //  }}}
    //  {{{ getYShouldReturnYCoordinate()

    /**
     * @test
     */
    public function getYShouldReturnYCoordinate()
    {
        $factory = $this->_getFactory();
        $point = $factory->createPoint(2, 4);
        $this->assertEquals(4, $point->getY());
    }

    //  }}}
    //  {{{ getDistanceShouldReturnDistanceBetweenTwoPoints()

    /**
     * @test
     */
    public function getDistanceShouldReturnDistanceBetweenTwoPoints()
    {
        $factory = $this->_getFactory();
        $point1 = $factory->createPoint(1, 1);
        $point2 = $factory->createPoint(1, 2);

        $this->assertEquals(1, $point1->getDistance($point2));
    }

    //  }}}
}
