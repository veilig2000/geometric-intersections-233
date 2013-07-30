<?php
class Circle_Intersect_Circle implements IntersectInterface
{
    public function intersect(Circle $circle1, Circle $circle2)
    {
        $point1 = $circle1->getPoint();
        $point2 = $circle2->getPoint();

        $distance = $point1->getDistance($point2);

        $radius1 = $circle1->getRadius();
        $radius2 = $circle2->getRadius();
        return ($radius1 + $radius2) >= $minDistance;
    }
}
