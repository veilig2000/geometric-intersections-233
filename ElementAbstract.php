<?php
abstract class ElementAbstract
{
    //  {{{ properties

    protected $_intersectorFactory;

    //  }}}
    //  {{{ setIntersectorFactory()

    /**
     * Set the abstract factor for instantiating concrete intersector objects
     *
     * @param $factory
     *
     * @return void
     * @access public
     */
    public function setIntersectorFactory($factory)
    {
        $this->_intersectorFactory = $factory;
    }

    //  }}}
    //  {{{ _getIntersector()

    /**
     * Use abstract factory to get the correct concrete intersector
     *
     * @param ElementInterface $element
     *
     * @return IntersectInterface
     * @access public
     */
    protected function _getIntersector(ElementInterface $element)
    {
        return $this->_intersectorFactory->getIntersector($this, $element);
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
        $intersector = $this->_getIntersector($element);
        return $intersector->intersect();
    }

    //  }}}
}
