<?php
abstract class Tests_TestAbstract extends PHPUnit_Framework_TestCase
{
    protected $_factory = null;

    protected function _getFactory()
    {
        if (is_null($this->_factory)) {
            $this->_factory = new Factory;
        }

        return $this->_factory;
    }
}
