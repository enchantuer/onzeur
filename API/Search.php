<?php

require_once 'DatabaseInteraction.php';

abstract class Search extends DatabaseInteraction {
    public string $search;
    public array $results;

    protected static string $searchFunction;
    protected static string $searchElement;

    public function __construct(string $search) {
        $this->search = strtolower($search);
    }

    public function find(): false|array {
        $this->results = [];
        $data = (static::$searchFunction)(self::$db, $this->search);
        if ($data === false) {
            return false;
        }
        foreach ($data as $elementData) {
            $this->results[] = (static::$searchElement)::fromArray($elementData);
        }
        return $this->results;
    }
}