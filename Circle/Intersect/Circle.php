<?php
class Circle_Intersect_Circle implements IntersectInterface
{
    //  {{{ intersect()

    /**
     * Find if a circle intersects with another circle
     *
     * @param ElementInterface $e1 Circle
     * @param ElementInterface $e2 Circle
     *
     * @return bool
     * @access public
     */
    public function intersect(ElementInterface $e1, ElementInterface $e2)
    {
        $point1 = $e1->getPoint();
        $point2 = $e2->getPoint();

        $distance = $point1->getDistance($point2);

        return ($e1->getRadius() + $e2->getRadius()) >= $distance;
    }

    //  }}}
}
