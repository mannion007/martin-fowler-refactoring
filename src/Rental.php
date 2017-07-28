<?php

namespace Mannion007\MartinFowlerRefactoring;

class Rental
{
    private $movie;
    private $daysRented;

    public function __construct(MovieInterface $movie, $daysRented)
    {
        $this->movie = $movie;
        $this->daysRented = $daysRented;
    }

    public function getMovie()
    {
        return $this->movie;
    }

    public function getDaysRented()
    {
        return $this->daysRented;
    }

    public function getFrequentRenterPoints()
    {
        return $this->movie->getFrequentRenterPoints($this->daysRented);
    }

    public function getAmount()
    {
        return $this->movie->getAmount($this->daysRented);
    }
}
