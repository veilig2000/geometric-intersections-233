<?php
class Point_Collection implements Iterator
{
    //  {{{ properties

    /**
     * Postition in the iterator
     * @var integer
     * @access private
     */
    private $_position = 0;

    /**
     * Array of items to iterator over
     * @var array
     * @access private
     */
    private $_array = array();

    //  }}}
    //  {{{ rewind()

    /**
     * Rest the iterator to the beginning
     *
     * @return $this
     * @access public
     */
    public function rewind()
    {
        $this->_position = 0;
        return $this;
    }

    //  }}}
    //  {{{ current()

    /**
     * Get value at the current index of the iterator
     *
     * @return Point
     * @access public
     */
    public function current()
    {
        return $this->_array[$this->_position];
    }

    //  }}}
    //  {{{ key()

    /**
     * Get the current index
     *
     * @return integer
     * @access public
     */
    public function key()
    {
        return $this->_position;
    }

    //  }}}
    //  {{{ next()

    /**
     * Set the iterator to the next index
     *
     * @return $this
     * @access public
     */
    public function next()
    {
        ++$this->_position;
        return $this;
    }

    //  }}}
    //  {{{ hasNext()

    /**
     * get if there is another element in interator
     *
     * @return $this
     * @access public
     */
    public function hasNext()
    {
        return isset($this->_array[$this->_position + 1]);
    }

    //  }}}
    //  {{{ valid()

    /**
     * Get if the current index has a value set
     *
     * @return bool
     * @access public
     */
    public function valid()
    {
        return isset($this->_array[$this->_position]);
    }

    //  }}}
    //  {{{ getSize()

    /**
     * Get the number of elements in the iterator
     *
     * @return integer
     * @access public
     */
    public function getSize()
    {
        return count($this->_array);
    }

    //  }}}
    //  {{{ _getLastOpenPosition()

    /**
     * Get the index of the last available position in the iterator
     *
     * @return integer
     * @access public
     */
    private function _getLastOpenPosition()
    {
        $this->rewind();
        while ($this->valid()) {
            $this->next();
        }

        return $this->_position;
    }

    //  }}}
    //  {{{ add()

    /**
     * Add a point to the iterator
     *
     * @return $this
     * @access public
     */
    public function add(Point $point)
    {
        $pos = $this->_getLastOpenPosition();
        $this->_array[$pos] = $point;

        return $this;
    }

    //  }}}
}
