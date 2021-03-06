<?php

class Line extends ElementAbstract implements ElementInterface
{
    //  {{{ properties

    /**
     * Point 1
     * @var Point
     * @access private
     */
    private $_p1;

    /**
     * Point 2
     * @var Point
     * @access private
     */
    private $_p2;

    //  }}}
    //  {{{ __construct()

    /**
     * Constructor
     *
     * @param Point $point1
     * @param Point $point2
     *
     * @return void
     * @access public
     */
    public function __construct(Point $point1, Point $point2)
    {
        $this->_p1 = $point1;
        $this->_p2 = $point2;
    }

    //  }}}
    //  {{{ getPoint1()

    /**
     * Get point 1
     *
     * @return Point
     * @access public
     */
    public function getPoint1()
    {
        return $this->_p1;
    }

    //  }}}
    //  {{{ getPoint2()

    /**
     * Get point 2
     *
     * @return Point
     * @access public
     */
    public function getPoint2()
    {
        return $this->_p2;
    }

    //  }}}
}
