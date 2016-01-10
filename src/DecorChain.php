<?php

namespace Fine\Decor;

class DecorChain implements DecorInterface
{

    protected $_decor;

    public function setSubject($subject)
    {
        $this->_subject = $subject;
        return $this;
    }

    public function getSubject()
    {
        return $this->_subject;
    }

    public function addDecor(DecorInterface $decor)
    {
        $this->_decor[] = $decor;
        return $this;

    }
    public function addDecors(array $decors)
    {
        foreach ($decors as $decor) {
            $this->addDecor($decor);
        }
        return $this;
    }

    public function decorate()
    {
        $subject = $this->_subject;
        foreach ($this->_decor as $decor) {
            $subject = $decor->setSubject($subject)->decorate();
        }
        return $subject;
    }

}
