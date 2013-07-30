<?php
class Polygon_Intersect_Factory
{
    //  {{{ getIntersector()

    /**
     * Get the intersector to handle logicical differences
     *
     * @param Polygon $polygon
     * @param ElementInterface $element
     *
     * @return IntersectInterface
     * @access public
     */
    public function getIntersector(Polygon $polygon, ElementInterface $element)
    {
        switch (get_class($element)) {
            case 'Line' :
                $intersector = new Polygon_Intersect_Line($polygon, $element);
                break;

            case 'Circle' :
                $intersector = new Polygon_Intersect_Circle($polygon, $element);
                break;

            case 'Polygon' :
                $intersector = new Polygon_Intersect_Polygon($polygon, $element);
                break;

            default :
                //  do nothing
                break;
        }

        return $intersector;
    }

    //  }}}
}
