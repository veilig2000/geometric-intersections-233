<?php

class FactoryTest extends PHPUnit_Framework_TestCase
{
    //  {{{ setUp()

    protected function setUp()
    {
        $this->_sut = new Factory;
    }

    //  }}}
    //  {{{ createPointShouldReturnPointObject()

    /**
     * @test
     */
    public function createPointShouldReturnPointObject()
    {
        $point = $this->_sut->createPoint(1, 1);
        $this->assertInstanceOf('Point', $point);
    }

    //  }}}
    //  {{{ createLineShouldReturnLineObject()

    /**
     * @test
     */
    public function createLineShouldReturnLineObject()
    {
        $p1 = $this->_sut->createPoint(1, 1);
        $p2 = $this->_sut->createPoint(2, 2);

        $line = $this->_sut->createLine($p1, $p2);
        $this->assertInstanceOf('Line', $line);
    }

    //  }}}
    //  {{{ createCircleShouldReturnCircleObject()

    /**
     * @test
     */
    public function createCircleShouldReturnCircleObject()
    {
        $p = $this->_sut->createPoint(1, 1);

        $circle = $this->_sut->createCircle($p, 1);
        $this->assertInstanceOf('Circle', $circle);
    }

    //  }}}
    //  {{{ createPointCollectionhouldReturnPointCollectionObject()

    /**
     * @test
     */
    public function createPointCollectionhouldReturnPointCollectionObject()
    {
        $pointCollection = $this->_sut->createPointCollection();
        $this->assertInstanceOf('Point_Collection', $pointCollection);

        return $pointCollection;
    }

    //  }}}
    //  {{{ createPolygonShouldReturnPolygonObject()

    /**
     * @test
     * @depends createPointCollectionhouldReturnPointCollectionObject
     */
    public function createPolygonShouldReturnPolygonObject($pointCollection)
    {
        $pointCollection->add($this->_sut->createPoint(1, 1))
                        ->add($this->_sut->createPoint(2, 2))
                        ->add($this->_sut->createPoint(3, 3));

        $polygon = $this->_sut->createPolygon($pointCollection);
        $this->assertInstanceOf('Polygon', $polygon);
    }

    //  }}}
}
