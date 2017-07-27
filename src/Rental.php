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
        $amount = 0;
        switch ($this->getMovie()->getPriceCode()) {
            case Movie::REGULAR:
                $amount += 2;
                if ($this->getDaysRented() > 2) {
                    $amount += ($this->getDaysRented() - 2) * 1.5;
                }
                break;
            case Movie::NEW_RELEASE:
                $amount += $this->getDaysRented() * 3;
                break;
            case Movie::CHILDRENS:
                $amount += 1.5;
                if ($this->getDaysRented() > 3) {
                    $amount += ($this->getDaysRented() - 3) * 1.5;
                }
                break;
        }
        return $amount;
    }
}
