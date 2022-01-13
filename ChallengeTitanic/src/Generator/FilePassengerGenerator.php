<?php

namespace App\Generator;

class FilePassengerGenerator
{
    public function getGenerator($fileName){
        $fileHandle = fopen($fileName, 'r');
        $cpt=0;
        while(false !== $line = fgets($fileHandle)) {
            if($cpt++===0) continue;
            yield $line;
        }
        fclose($fileHandle);
    }
}