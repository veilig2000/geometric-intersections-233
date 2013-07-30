<?php
class Polygon_Intersect_Line implements IntersectInterface
{
    //  {{{ intersect

    /**
     * Find if a polygon intersects with a Line
     *
     * @param ElementInterface $e1 Polygon
     * @param ElementInterface $e2 Line
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
    }

    //  }}}
}
