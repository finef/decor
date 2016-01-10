<?php

namespace Fine\Decor;

interface DecorInterface
{

    const PLACEMENT_PREPEND = 'PLACEMENT_PREPEND';
    const PLACEMENT_APPEND  = 'PLACEMENT_APPEND';
    const PLACEMENT_EMBRACE = 'PLACEMENT_EMBRACE';

    /**
     * Sets subject to decorate
     *
     * @return mixed Subject
     */
    public function setSubject($mValue);

    /**
     * Sets decoration
     */
    public function setDecor($mValue);

    /**
     * Sets second decoration
     */
    public function setDecor2($mValue);

    public function setPlacement($mValue);

    /**
     * Decorate `subject` with `decor` and `decor2`
     *
     * @return mixed Decorated subject
     */
    public function decorate();

}
