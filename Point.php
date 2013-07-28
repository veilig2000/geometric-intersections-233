<?php
class Point
{
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
}
