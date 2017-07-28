<?php

namespace Mannion007\MartinFowlerRefactoring;

use Mannion007\MartinFowlerRefactoring\Movie\MovieInterface;

class Rental
{
    private $movie;
    private $daysRented;

    public function __construct(MovieInterface $movie, int $daysRented)
    {
        $this->movie = $movie;
        $this->daysRented = $daysRented;
    }

    public function getMovie() : MovieInterface
    {
        return $this->movie;
    }

    public function getDaysRented() : int
    {
        return $this->daysRented;
    }

    public function getFrequentRenterPoints() : int
    {
        return $this->movie->getFrequentRenterPoints($this->daysRented);
    }

    public function getAmount() : float
    {
        return $this->movie->getAmountForRentalLasting($this->daysRented);
    }
}
