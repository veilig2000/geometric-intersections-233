<?php

class Point
{
    //  {{{ properties

    /**
     * X coordinate
     * @var integer
     * @access private
     */
    private $_x;

    /**
     * Y coordinate
     * @var integer
     * @access private
     */
    private $_y;

    //  }}}
    //  {{{ __construct()

    /**
     * Constructor
     *
     * @param integer $x
     * @param integer $y
     *
     * @return void
     * @access public
     */
    public function __construct($x, $y)
    {
        $this->_x = $x;
        $this->_y = $y;
    }

    //  }}}
    //  {{{ getX()

    /**
     * Get the X coordinate
     *
     * @return integer
     * @access public
     */
    public function getX()
    {
        return $this->_x;
    }

    //  }}}
    //  {{{ getY()

    /**
     * Get the Y coordinate
     *
     * @return integer
     * @access public
     */
    public function getY()
    {
        return $this->_y;
    }

    //  }}}
    //  {{{ getDistance()

    /**
     * Get the distance between this point and another
     *
     * Use pythagorean theorem to find the distance
     *
     * @param Point $point
     *
     * @return double
     * @access public
     */
    public function getDistance(Point $point)
    {
        $xDistance = $this->getX() - $point->getX();
        $yDistance = $this->getY() - $point->getY();

        return sqrt(pow($xDistance, 2) + pow($yDistance, 2));
    }

    //  }}}
}
