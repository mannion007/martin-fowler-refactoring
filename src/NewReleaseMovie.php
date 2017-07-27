<?php

namespace Mannion007\MartinFowlerRefactoring;

class NewReleaseMovie extends Movie
{
    public function __construct(string $title)
    {
        parent::__construct($title, Movie::NEW_RELEASE);
    }

    public function getFrequentRenterPoints(int $daysRented)
    {
        if ($daysRented > 1) {
            return 2;
        }
        return 1;
    }
}
