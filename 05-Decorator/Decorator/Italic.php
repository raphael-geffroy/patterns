<?php
require_once __DIR__.'/AbstractHtmlDecorator.php';

class Italic extends AbstractHtmlDecorator
{
    public function __toString(): string
    {
        return sprintf(
            "<i>%s</i>",
            (string) $this->decorated
        );
    }
}