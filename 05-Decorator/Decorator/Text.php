<?php
require_once __DIR__.'/Html.php';
class Text implements Html
{
    function __construct(private string $message){}

    public function __toString(): string
    {
        return $this->message;
    }
}