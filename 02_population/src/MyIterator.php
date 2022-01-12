<?php

namespace App;

use SplFileObject;

class MyIterator implements \Iterator
{
    private SplFileObject $file;

    public function __construct(string $path) {
        $this->file = new SplFileObject($path);
    }

    public function rewind():void {
        $this->file->rewind();
    }

    public function current():array {
        return explode(", ", trim($this->file->current()));
    }

    public function key() {
        return $this->file->key();
    }

    public function next(): void {
        $this->file->next();
    }

    public function valid(): bool {
        return $this->file->valid();
    }
}