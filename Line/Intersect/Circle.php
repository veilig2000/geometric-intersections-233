<?php
class Line_Intersect_Circle implements IntersectInterface
{
    //  {{{ intersect()

    /**
     * Find if a line intersects with a circle
     *
     * @param ElementInterface $e1 Line
     * @param ElementInterface $e2 Circle
     *
     * @return bool
     * @access public
     */
    public function intersect(ElementInterface $e1, ElementInterface $e2)
    {
        $linePoint1 = $e1->getPoint1();
        $linePoint2 = $e1->getPoint2();

        $circlePoint = $e2->getPoint();

        $point1Distance = $circlePoint->getDistance($linePoint1);
        $point2Distance = $circlePoint->getDistance($linePoint2);

        $minDistance = min($point1Distance, $point2Distance);

        return $e2->getRadius() >= $minDistance;
    }

    //  }}}
}
