<?php

namespace Mannion007\MartinFowlerRefactoring\Movie;

interface MovieInterface
{
    public function getTitle() : string;
    public function getAmount(int $daysRented) : float;
    public function getFrequentRenterPoints(int $daysRented) : int;
}