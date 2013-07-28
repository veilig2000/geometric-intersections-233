<?php
class Point_Collection implements Iterator
{
    private $_position = 0;
    private $_array = array();

    public function __construct()
    {
    }

    public function rewind()
    {
        $this->_position = 0;
    }

    public function current()
    {
        return $this->_array[$this->_position];
    }

    public function key()
    {
        return $this->_position;
    }

    public function next()
    {
        ++$this->_position;
    }

    public function valid()
    {
        return isset($this->_array[$this->_position]);
    }

    public function getSize()
    {
        return count($this->_array);
    }

    private function _getLastOpenPosition()
    {
        $this->rewind();
        while ($this->valid()) {
            $this->next();
        }

        return $this->_position;
    }

    public function add(Point $point)
    {
        $pos = $this->_getLastOpenPosition();
        $this->_array[$pos] = $point;

        return $this;
    }
}
