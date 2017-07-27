<?php

namespace Mannion007\MartinFowlerRefactoring;

class Rental
{

    /**
     * @var Movie
     */
    private $movie;

    /**
     * @var int
     */
    private $daysRented;

    /**
     * Rental constructor.
     * @param Movie $movie
     * @param int $daysRented
     */
    public function __construct(Movie $movie, $daysRented)
    {
        $this->movie = $movie;
        $this->daysRented = $daysRented;
    }

    /**
     * @return Movie
     */
    public function getMovie()
    {
        return $this->movie;
    }

    /**
     * @return int
     */
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
