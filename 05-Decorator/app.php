<?php

require_once __DIR__.'/Decorator/Paragraph.php';
require_once __DIR__.'/Decorator/Italic.php';
require_once __DIR__.'/Decorator/Text.php';

echo(new Paragraph(new Italic(new Text("Hello World !"))));
echo(new Paragraph(new Italic(new Text("Hello World !")), 'text-white'));
//<p><i>Hello World !</i></p>
//<p class="text-white"><i>Hello World !</i></p>%