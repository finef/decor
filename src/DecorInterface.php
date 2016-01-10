<?php

namespace Fine\Decor;

interface DecorInterface
{

    /**
     * Sets subject to decorate
     *
     * @return mixed Subject
     */
    public function setSubject($subject);

    /**
     * Decorate `subject` with `decor` and `decor2`
     *
     * @return mixed Decorated subject
     */
    public function decorate();

}
