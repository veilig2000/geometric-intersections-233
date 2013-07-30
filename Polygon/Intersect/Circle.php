<?php
class Polygon_Intersect_Circle implements IntersectInterface
{
    //  {{{ intersect

    /**
     * Find if a polygon intersects with a circle
     *
     * @param ElementInterface $e1 Polygon
     * @param ElementInterface $e2 Circle
     *
     * @return bool
     * @access public
     */
    public function intersect(ElementInterface $e1, ElementInterface $e2)
    {
        $lines = $e1->getLines();
        foreach ($lines as $line) {
            if ($line->intersect($e2)) {
                return true;
            }
        }

        return false;
    }

    //  }}}
}
