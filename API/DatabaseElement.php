<?php
require_once '../php/database.php';
require_once 'DatabaseInteraction.php';

abstract class DatabaseElement extends DatabaseInteraction {
    public int|null $id;

    protected static string $functionGet;

    public function __construct(int $id=null) {
        $this->id = $id;
    }

    protected static function fromElement($element, string $getFunction): false|array {
        $elements = [];
        $id = is_int($element) ? $element : $element->id;
        $data = $getFunction(self::$db, $id);
        if ($data === false) {
            return false;
        }
        foreach ($data as $elementData) {
            $elements[] = static::fromArray($elementData);
        }
        return $elements;
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

    public function get() {
        return (static::$functionGet)(self::$db, $this->id);
    }
    abstract public function add();
    abstract public function update();
}