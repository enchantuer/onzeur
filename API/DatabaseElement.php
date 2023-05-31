<?php
require_once '../php/database.php';
require_once 'DatabaseInteraction.php';

abstract class DatabaseElement extends DatabaseInteraction {
    public int|null $id;

    public function __construct(int $id=null) {
        $this->id = $id;
    }

    abstract public static function fromArray(array $data): static;
    public static function fromId(int $id): false|static {
        $element = new static($id);
        $bool = $element->get();
        if (!$bool) {
            return false;
        }
        return $element;
    }

    abstract public function get(): false|static;
    abstract public function add();
    abstract public function update();
}