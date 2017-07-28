<?php

namespace Mannion007\MartinFowlerRefactoring\Movie;

abstract class AbstractMovie
{
    private $title;

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    public function getFrequentRenterPoints(int $daysRented) : int
    {
        return 1;
    }
}
