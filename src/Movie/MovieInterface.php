<?php

namespace Mannion007\MartinFowlerRefactoring\Movie;

interface MovieInterface
{
    public function getTitle() : string;
    public function getAmountForRentalLasting(int $daysRented) : float;
    public function getFrequentRenterPointsForRentalLasting(int $daysRented) : int;
}