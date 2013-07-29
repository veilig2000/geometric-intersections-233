<?php

class Tests_Point_CollectionTest extends Tests_TestAbstract
{
    //  {{{ setUp()

    protected function setUp()
    {
        $factory = $this->_getFactory();
        $this->_sut = $factory->createPointCollection();
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
        $factory = $this->_getFactory();

        $point = $factory->createPoint(1, 1);
        $this->_sut->add($point);
        //  Test that we go from 0 to 1
        $this->assertEquals(1, $this->_sut->getSize());

        $point = $factory->createPoint(2, 2);
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
        $factory = $this->_getFactory();
        $point = $factory->createPoint(1, 1);
        $this->_sut->add($point);

        $currentPoint = $this->_sut->current();

        $this->assertSame(spl_object_hash($point), spl_object_hash($currentPoint));
    }

    //  }}}
}
