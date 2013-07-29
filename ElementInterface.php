<?php
interface ElementInterface
{
    /**
     * Determine if element intersects with another element
     *
     * @param ElementInterface $element
     *
     * @return bool
     * @access public
     */
    public function intersect(ElementInterface $element);
}
