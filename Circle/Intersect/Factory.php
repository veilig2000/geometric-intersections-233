<?php
class Circle_Intersect_Factory
{
    //  {{{ getIntersector()

    /**
     * Get the intersector to handle logicical differences
     *
     * @param Circle $circle
     * @param ElementInterface $element
     *
     * @return IntersectInterface
     * @access public
     */
    public function getIntersector(Circle $circle, ElementInterface $element)
    {
        switch (get_class($element)) {
            case 'Line' :
                $intersector = new Circle_Intersect_Line($circle, $element);
                break;

            case 'Circle' :
                $intersector = new Circle_Intersect_Circle($circle, $element);
                break;

            case 'Polygon' :
                $intersector = new Circle_Intersect_Polygon($circle, $element);
                break;

            default :
                //  do nothing
                break;
        }

        return $intersector;
    }

    //  }}}
}
