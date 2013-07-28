<?php

class Tests_PolygonTest extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $collection = new Point_Collection();

        for ($i = 1; $i < 5; ++$i) {
            $point = new Point($i, $i);
            $collection->add($point);
        }

        $this->_sut = new Polygon($collection);
    }

    /**
     * @test
     */
    public function objectInstanceOfShouldBePolygon()
    {
        $this->assertInstanceOf('Polygon', $this->_sut);
    }

    /**
     * @test
     */
    public function getPointsShouldReturnPointCollection()
    {
        $this->assertInstanceOf('Point_Collection', $this->_sut->getPoints());
    }

    /**
     * @test
     */
    public function AddPointsShouldAddPointToCollection()
    {
        $collectionBefore = $this->_sut->getPoints();
        $beforeSize = $collectionBefore->getSize();

        $point = new Point(6, 6);
        $this->_sut->addPoint($point);

        $collectionAfter = $this->_sut->getPoints();
        $afterSize = $collectionAfter->getSize();

        $this->assertEquals(1, $afterSize - $beforeSize);
    }
}
