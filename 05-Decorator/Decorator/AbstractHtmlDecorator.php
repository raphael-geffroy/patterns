<?php
require_once __DIR__ . '/Html.php';

abstract class AbstractHtmlDecorator implements Html
{
    function __construct(protected Html $decorated, protected string $classes = '')
    {
    }
}