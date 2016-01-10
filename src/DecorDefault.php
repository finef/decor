<?php

namespace Fine\Decor;

class Decor implements DecorInterface
{

    protected $_subject;
    protected $_decor;
    protected $_decor2;
    protected $_placement = DecorInterface::PLACEMENT_APPEND;

    public function __construct(array $config = array())
    {
        foreach ($config as $method => $arg) {
            $this->{$method}($arg);
        }
    }

    public function setSubject($subject)
    {
        $this->_subject = $subject;
        return $this;
    }

    public function getSubject()
    {
        return $this->_subject;
    }

    public function setDecor($decor)
    {
        $this->_decor = $decor;
        return $this;
    }

    public function getDecor()
    {
        return $this->_decor;
    }

    public function setDecor2($decor)
    {
        $this->_decor = $decor;
        return $this;
    }

    public function getDecor2()
    {
        return $this->_decor;
    }

    public function setPlacement($placement)
    {
        $this->_placement = $placement;
        return $this;
    }

    public function getPlacement()
    {
        return $this->_placement;
    }

    public function decorate()
    {
        return $this->_decorate();
    }

    protected function _decorate()
    {
        switch ($this->_placement) {

            case self::PLACEMENT_PREPEND:
                return $this->_decor . $this->_decor2 . $this->_subject;

            case self::PLACEMENT_APPEND:
                return $this->_subject . $this->_decor . $this->_decor2;

            case self::PLACEMENT_EMBRACE:
                return $this->_decor . $this->_subject. $this->_decor2;

            default:
                throw new LogicException();
        }
    }

}
