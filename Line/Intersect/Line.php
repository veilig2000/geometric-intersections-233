<?php
class Line_Intersect_Line implements IntersectInterface
{
    //  {{{ properties

    private $_line1;
    private $_line2;

    //  }}}
    //  {{{ __construct()

    /**
     * Constructor
     *
     * @param Line $line1
     * @param Line $line2
     *
     * @return bool
     * @access public
     */
    public function __construct(Line $line1, Line $line2)
    {
        $this->_line1 = $line1;
        $this->_line2 = $line2;
    }

    //  }}}
    //  {{{ intersect

    /**
     * Find if two lines intersect
     *
     * @return bool
     * @access public
     */
    public function intersect()
    {
        $l1p1 = $this->_line1->getPoint1();
        $l1p2 = $this->_line1->getPoint2();

        $A1 = $l1p2->getY() - $l1p1->getY();
        $B1 = $l1p1->getX() - $l1p2->getX();
        $C1 = ($A1 * $l1p1->getX()) + ($B1 * $l1p1->getY());

        $l2p1 = $this->_line2->getPoint1();
        $l2p2 = $this->_line2->getPoint2();

        $A2 = $l2p2->getY() - $l2p1->getY();
        $B2 = $l2p1->getX() - $l2p2->getX();
        $C2 = ($A2 * $l2p1->getX()) + ($B2 * $l2p1->getY());

        $det = $A1 * $B2 - $A2 * $B1;
        if (0 === $det) {
            return false;
        } else {
            //  Lines "could" cross, but need to test if these segments actually do

            //  X/Y Coords
            $x = ($B2 * $C1 - $B1 * $C2) / $det;
            $y = ($A1 * $C2 - $A2 * $C1) / $det;

            // if (x1 < x < x2) and if (y1 < y < y2)
            // the points should be on the line
            // check that its on both lines and we have an intersection

            $xValid = $this->_inBetween($l1p1->getX(), $x, $l1p2->getX());
            $yValid = $this->_inBetween($l1p1->getY(), $y, $l1p2->getY());
            $l1Valid = ($xValid && $yValid);

            $xValid = $this->_inBetween($l2p1->getX(), $x, $l2p2->getX());
            $yValid = $this->_inBetween($l2p1->getY(), $y, $l2p2->getY());
            $l2Valid = ($xValid && $yValid);

            return $l1Valid && $l2Valid;
        }
    }

    //  }}}
    //  {{{ _inBetween()

    /**
     * Check fwd and backwards
     *
     * @param integer $i1
     * @param integer $i
     * @param integer $i2
     *
     * @return bool
     * @access private
     */
    private function _inBetween($i1, $i, $i2)
    {
        if ($i1 <= $i && $i <= $i2) {
            return true;
        } elseif ($i2 <= $i && $i <= $i1) {
            return true;
        } else {
            return false;
        }
    }

    //  }}}
}
