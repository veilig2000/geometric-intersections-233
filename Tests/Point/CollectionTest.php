<?php

class Tests_Point_CollectionTest extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->_sut = new Point_Collection();
    }

    /**
     * @test
     */
    public function objectInstanceOfShouldBePointsCollection()
    {
        $this->assertInstanceOf($this->_sut, 'Point_Collection');
    }
}
