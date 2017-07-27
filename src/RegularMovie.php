<?php

namespace Mannion007\MartinFowlerRefactoring;

class RegularMovie extends Movie
{
    public function __construct(string $title)
    {
        parent::__construct($title, Movie::REGULAR);
    }

    public function getAmount(int $daysRented)
    {
        $amount = 2;
        if ($daysRented > 2) {
            $amount += ($daysRented - 2) * 1.5;
        }
        return $amount;
    }
}
