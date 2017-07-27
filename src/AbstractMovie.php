<?php

namespace Mannion007\MartinFowlerRefactoring;

abstract class AbstractMovie
{
    private $title;

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getFrequentRenterPoints(int $daysRented)
    {
        return 1;
    }
}
