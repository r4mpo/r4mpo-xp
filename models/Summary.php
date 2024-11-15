<?php

class Summary extends Database
{
    protected $table = "summaries_tbl";
    protected $types = ["education" => 1, "profission" => 2];

    public function getType($type): mixed {
        return $this->types[$type];
    }
}