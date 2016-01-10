<?php

namespace Fine\Decor;

class HtmlTag extends Decor
{

    protected $_placement = self::PLACEMENT_EMBRACE;
    protected $_tag = 'div';
    protected $_attr = array();
    protected $_short = false;

    public function setTag($tag)
    {
        $this->_tag = $tag;
        return $this;
    }

    public function getTag()
    {
        return $this->_tag;
    }

    public function hasAttr($name)
    {
        return array_key_exists($name, $this->_attr);
    }

    public function setAttr($name, $val)
    {
        $this->_attr[$name] = $val;
        return $this;
    }

    public function getAttr($name)
    {
        return $this->_attr[$name];
    }

    public function removeAttr($name)
    {
        unset($this->_attr[$name]);
    }

    public function hasAttrs(array $names)
    {
        foreach ($names as $name) {
            if ($this->isAttrs($name)) {
                continue;
            }
            return false;
        }

        return true;
    }

    public function setAttrs(array $attrs)
    {
        foreach ($attrs as $name => $val) {
            $this->setAttr($name, $val);
        }
    }

    public function getAttrs()
    {
        return $this->_attr;
    }

    public function removeAttrs()
    {
        $this->_attr = array();
        return $this;
    }

    public function setShort($short)
    {
        $this->_short = $short;
        return $this;
    }

    public function isShort()
    {
        return $this->_short;
    }

    public function addClass($class)
    {
        // @TODO
    }

    public function addClasses(array $classes)
    {
        // @TODO
    }

    public function setStyle($attr, $val)
    {
        // @TODO
    }

    public function setStyles(array $styles)
    {
        // @TODO
    }

    public function removeStyle($attr)
    {
        // @TODO
    }

    public function setId($id)
    {
        $this->_id = $id;
        return $this;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function render()
    {
        $attr = "";
        if ($this->_attr) {
            foreach ((array)$this->_attr as $k => $v) {
                $attr .= ' ' . htmlspecialchars($k) . '="' . htmlspecialchars($v) . '"';
            }
        }

        if ($this->_short === true) {
            $this->_decor  = "$this->_prepend<{$this->_tag}{$attr} />$this->_append";
            $this->_decor2 = "";
        }
        else {
            $this->_decor  = "$this->_prepend<{$this->_tag}{$attr}>$this->_innerPrepend";
            $this->_decor2 = "$this->_innerAppend</{$this->_tag}>$this->_append";
        }

        return $this->_render();
    }

}
