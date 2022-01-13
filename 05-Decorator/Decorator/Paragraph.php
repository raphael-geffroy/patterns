<?php
require_once __DIR__.'/AbstractHtmlDecorator.php';
class Paragraph extends AbstractHtmlDecorator
{
    public function __toString(): string
    {
        return sprintf(
            "<p%s>%s</p>",
            $this->classes? ' class="'.$this->classes.'"':'',
            (string) $this->decorated
        );
    }
}