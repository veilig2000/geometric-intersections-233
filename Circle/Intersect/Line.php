<?php
class Circle_Intersect_Line implements IntersectInterface
{
    public function intersect(Circle $circle, Line $line)
    {
        $linePoint1 = $line->getPoint1();
        $linePoint2 = $line->getPoint2();

        $circlePoint = $circle->getPoint();

        $point1Distance = $circlePoint->getDistance($linePoint1);
        $point2Distance = $circlePoint->getDistance($linePoint2);

        $minDistance = min($point1Distance, $point2Distance);

        return $circle->getRadius() >= $minDistance;
    }
}
