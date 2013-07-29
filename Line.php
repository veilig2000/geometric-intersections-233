<?php

class Line implements ElementInterface
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
    //  {{{ intersect()

    /**
     * Determine if element intersects with another element
     *
     * @param ElementInterface $element
     *
     * @return bool
     * @access public
     */
    public function intersect(ElementInterface $element)
    {
        if ('Circle' == get_class($element)) {
            $p1 = $this->getPoint1();
            $p2 = $this->getPoint2();
            $c  = $element->getPoint();

            $point1Distance = $c->getDistance($p1);
            $point2Distance = $c->getDistance($p2);

            $minDistance = min($point1Distance, $point2Distance);

            return $element->getRadius() >= $minDistance;
        } elseif ('Line' == get_class($element)) {
            $p1 = $this->getPoint1();
            $p2 = $this->getPoint2();

            $A1 = $p2->getY() - $p1->getY();
            $B1 = $p1->getX() - $p2->getX();
            $C1 = ($A1 * $p1->getX()) + ($B1 * $p1->getY());

            $p1 = $element->getPoint1();
            $p2 = $element->getPoint2();

            $A2 = $p2->getY() - $p1->getY();
            $B2 = $p1->getX() - $p2->getX();
            $C2 = ($A2 * $p1->getX()) + ($B2 * $p1->getY());

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

                $xValid = $this->_inBetween($p1->getX(), $x, $p2->getX());
                $yValid = $this->_inBetween($p1->getY(), $y, $p2->getY());

                return $xValid && $yValid;
            }
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
