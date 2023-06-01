<?php

require_once 'DatabaseInteraction.php';

abstract class Search extends DatabaseInteraction {
    public string $search;
    public array $results;

    public function __construct(string $search) {
        $this->search = strtolower($search);
    }

    abstract function find();
}