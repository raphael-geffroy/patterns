<?php

namespace App;

class ReadIterator implements \Iterator
{

    public function __construct(
        private string $file,
        private  $pointer = '',
        private int $countRow = 0,
    ) {
        $this->pointer = fopen($file, 'r');
    }

    public function rewind(): void
    {
        $this->countRow = 0;
        rewind($this->pointer); // remet le pointer au début
    }

    public function current(): array
    {
        $current = fgets($this->pointer, 4096);
        $this->countRow++;

        return explode( ',', $current);
    }

    public function key(): int
    {
        return $this->countRow;
    }

    public function next(): void
    {
        !feof($this->pointer);
    }

    public function valid(): bool {

        if ($this->next()) {
            return true;
        }
        fclose($this->pointer);

        return false;
    }
}