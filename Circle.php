<?php

class Circle implements ElementInterface
{
    //  {{{ properties

    /**
     * Point
     * @var Point
     * @access private
     */
    private $_point;

    /**
     * Radius
     * @var integer
     * @access private
     */
    private $_radius;

    //  }}}
    //  {{{ __construct()

    /**
     * Constructor
     *
     * @param Point $point
     * @param integer radius
     *
     * @return void
     * @access public
     */
    public function __construct(Point $point, $radius)
    {
        $this->_point  = $point;
        $this->_radius = $radius;
    }

    //  }}}
    //  {{{ getPoint()

    /**
     * Get point
     *
     * @return Point
     * @access public
     */
    public function getPoint()
    {
        return $this->_point;
    }

    //  }}}
    //  {{{ getRadius()

    /**
     * Get radius
     *
     * @return integer
     * @access public
     */
    public function getRadius()
    {
        return $this->_radius;
    }

    //  }}}
    //  {{{ intersect()

    /**
     * Determine if element intersects with another element
     *
     * @param ElementInterface $element
     *
     * @return bool
     * @access public
     */
    public function intersect(ElementInterface $element)
    {
        if ('Line' == get_class($element)) {
            $intersector = new Circle_Intersect_Line;
        } elseif ('Circle' == get_class($element)) {
            $intersector = new Circle_Intersect_Circle;
        }
        return $intersector->intersect($this, $element);
    }

    //  }}}
}
