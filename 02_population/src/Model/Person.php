<?php

namespace App\Model;

use Ds\Map;

class Person
{

    public function __construct(
        private int $id,
        private string $name,
        private ?Map $relations = null
    ){
        $this->relations = $relations ?? new Map();
    }

    public function getRelations(): Map
    {
        return $this->relations;
    }

    public function addRelation(Person $relation): self {
        $this->relations->put($relation->getId(), $relation);
        return $this;
    }

    public function countRelations(): int {
        return $this->relations->count();
    }

    public function setRelations(Map $relations): self
    {
        $this->relations = $relations;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }
}