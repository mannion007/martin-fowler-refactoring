<?php

namespace Mannion007\MartinFowlerRefactoring;

interface MovieInterface
{
    public function getTitle();
    public function getAmount(int $daysRented);
    public function getFrequentRenterPoints(int $daysRented);
}