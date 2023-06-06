<?php
include_once dirname(__DIR__).'/php/database.php';
require_once 'DatabaseInteraction.php';

abstract class DatabaseElement extends DatabaseInteraction {
    public int|null $id;

    protected static string $functionGet;

    public function __construct(int $id=null, int $page=0) {
        parent::__construct($page);
        $this->id = $id;
    }

    protected static function fromElement($element, string $getFunction, int $page=0): false|array {
        $elements = [];
        $id = is_int($element) ? $element : $element->id;
        $data = $getFunction(self::$db, $id, $page*20);
        if ($data === false) {
            return false;
        }
        foreach ($data as $elementData) {
            $elements[] = static::fromArray($elementData, $page);
        }
        return $elements;
    }

    abstract public static function fromArray(array $data, int $page=0): static;
    public static function fromId(int $id): false|static {
        $element = new static($id);
        $bool = $element->get();
        if (!$bool) {
            return false;
        }
        return $element;
    }

    public function get() {
        return (static::$functionGet)(self::$db, $this->id, $this->offset);
    }
    abstract public function add();
    abstract public function update();
}