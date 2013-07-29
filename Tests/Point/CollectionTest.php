<?php

class Tests_Point_CollectionTest extends PHPUnit_Framework_TestCase
{
    //  {{{ setUp()

    protected function setUp()
    {
        $this->_sut = new Point_Collection();
    }

    //  }}}
    //  {{{ objectInstanceOfShouldBePointsCollection()

    /**
     * @test
     */
    public function objectInstanceOfShouldBePointsCollection()
    {
        $this->assertInstanceOf('Point_Collection', $this->_sut);
    }

    //  }}}
    //  {{{ initialStateShouldBeEmpty()

    /**
     * @test
     */
    public function initialStateShouldBeEmpty()
    {
        $this->assertEquals(0, $this->_sut->getSize());
        $this->assertEquals(0, $this->_sut->key());
    }

    //  }}}
    //  {{{ addShouldAddNewPointToCollection()

    /**
     * @test
     */
    public function addShouldAddNewPointToCollection()
    {
        $point = new Point(1, 1);
        $this->_sut->add($point);
        //  Test that we go from 0 to 1
        $this->assertEquals(1, $this->_sut->getSize());

        $point = new Point(2, 2);
        $this->_sut->add($point);
        //  Test that we go from 1 to 2
        $this->assertEquals(2, $this->_sut->getSize());
    }

    //  }}}
    //  {{{ currentShouldReturnValueAtCurrentIndex()

    /**
     * @test
     */
    public function currentShouldReturnValueAtCurrentIndex()
    {
        $point = new Point(1, 1);
        $this->_sut->add($point);

        $currentPoint = $this->_sut->current();

        $this->assertSame(spl_object_hash($point), spl_object_hash($currentPoint));
    }

    //  }}}
}
