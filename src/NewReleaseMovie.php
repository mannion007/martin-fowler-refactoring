<?php

namespace Mannion007\MartinFowlerRefactoring;

class NewReleaseMovie extends Movie
{
    public function __construct(string $title)
    {
        parent::__construct($title);
    }

    public function getFrequentRenterPoints(int $daysRented)
    {
        if ($daysRented > 1) {
            return 2;
        }
        return 1;
    }

    public function getAmount(int $daysRented)
    {
        return $daysRented * 3;
    }
}
