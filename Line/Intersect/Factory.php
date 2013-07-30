<?php
class Line_Intersect_Factory
{
    //  {{{ getIntersector()

    /**
     * Get the intersector to handle logicical differences
     *
     * @param Line $line
     * @param ElementInterface $element
     *
     * @return IntersectInterface
     * @access public
     */
    public function getIntersector(Line $line, ElementInterface $element)
    {
        switch (get_class($element)) {
            case 'Line' :
                $intersector = new Line_Intersect_Line($line, $element);
                break;

            case 'Circle' :
                $intersector = new Line_Intersect_Circle($line, $element);
                break;

            case 'Polygon' :
                $intersector = new Line_Intersect_Polygon($line, $element);
                break;

            default :
                //  do nothing
                break;
        }

        return $intersector;
    }

    //  }}}
}
