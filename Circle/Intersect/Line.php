<?php
class Circle_Intersect_Line implements IntersectInterface
{
    //  {{{ intersect()

    /**
     * Find if a circle intersects with a line
     *
     * @param ElementInterface $e1 Circle
     * @param ElementInterface $e2 Line
     *
     * @return bool
     * @access public
     */
    public function intersect(ElementInterface $e1, ElementInterface $e2)
    {
        $linePoint1 = $e2->getPoint1();
        $linePoint2 = $e2->getPoint2();

        $circlePoint = $e1->getPoint();

        $point1Distance = $circlePoint->getDistance($linePoint1);
        $point2Distance = $circlePoint->getDistance($linePoint2);

        $minDistance = min($point1Distance, $point2Distance);

        return $e1->getRadius() >= $minDistance;
    }

    //  }}}
}
