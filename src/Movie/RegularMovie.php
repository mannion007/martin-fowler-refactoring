<?php

namespace Mannion007\MartinFowlerRefactoring\Movie;

class RegularMovie extends AbstractMovie implements MovieInterface
{
    public function __construct(string $title)
    {
        parent::__construct($title);
    }

    public function getAmount(int $daysRented) : float
    {
        $amount = 2;
        if ($daysRented > 2) {
            $amount += ($daysRented - 2) * 1.5;
        }
        return $amount;
    }
}
