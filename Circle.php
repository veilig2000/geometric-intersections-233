<?php

class Circle extends ElementAbstract implements ElementInterface
{
    //  {{{ properties

    /**
     * Point
     * @var Point
     * @access private
     */
    private $_point;

    /**
     * Radius
     * @var integer
     * @access private
     */
    private $_radius;

    //  }}}
    //  {{{ __construct()

    /**
     * Constructor
     *
     * @param Point $point
     * @param integer radius
     *
     * @return void
     * @access public
     */
    public function __construct(Point $point, $radius)
    {
        $this->_point  = $point;
        $this->_radius = $radius;
    }

    //  }}}
    //  {{{ getPoint()

    /**
     * Get point
     *
     * @return Point
     * @access public
     */
    public function getPoint()
    {
        return $this->_point;
    }

    //  }}}
    //  {{{ getRadius()

    /**
     * Get radius
     *
     * @return integer
     * @access public
     */
    public function getRadius()
    {
        return $this->_radius;
    }

    //  }}}
}
