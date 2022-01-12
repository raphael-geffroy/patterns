<?php

namespace App;

class ReadIterator implements \Iterator
{
    private $file;

    public function __construct(
        private string $path,
        private int $countRow = 0,
    ) {
        $this->file = fopen($path, 'r');
    }

    public function rewind(): void
    {
        $this->countRow = 0;
        fclose($this->file);
    }

    public function current(): array
    {
        $current = fgets($this->pointer);
        $this->countRow++;

        return explode( ',', $current);
    }

    public function key(): int
    {
        return $this->countRow;
    }

    public function next(): void
    {
        return;
    }

    public function valid(): bool {
        return !feof($this->pointer);
    }
}