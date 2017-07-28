<?php

namespace Mannion007\MartinFowlerRefactoring\Movie;

class NewReleaseMovie extends AbstractMovie implements MovieInterface
{
    public function __construct(string $title)
    {
        parent::__construct($title);
    }

    public function getFrequentRenterPoints(int $daysRented) : int
    {
        if ($daysRented > 1) {
            return 2;
        }
        return 1;
    }

    public function getAmount(int $daysRented) : float
    {
        return $daysRented * 3;
    }
}
