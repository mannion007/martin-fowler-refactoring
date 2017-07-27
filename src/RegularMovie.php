<?php

namespace Mannion007\MartinFowlerRefactoring;

class RegularMovie extends AbstractMovie implements MovieInterface
{
    public function __construct(string $title)
    {
        parent::__construct($title);
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
