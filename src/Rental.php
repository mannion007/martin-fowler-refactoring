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
        // add frequent renter points
        $frequentRenterPoints = 1;
        // add bonus for a two day new release rental
        if (($this->getMovie()->getPriceCode() == Movie::NEW_RELEASE) && $this->getDaysRented() > 1) {
            $frequentRenterPoints++;
        }
        return $frequentRenterPoints;
    }

    public function getAmount()
    {
        $thisAmount = 0;
        switch ($this->getMovie()->getPriceCode()) {
            case Movie::REGULAR:
                $thisAmount += 2;
                if ($this->getDaysRented() > 2) {
                    $thisAmount += ($this->getDaysRented() - 2) * 1.5;
                }
                break;
            case Movie::NEW_RELEASE:
                $thisAmount += $this->getDaysRented() * 3;
                break;
            case Movie::CHILDRENS:
                $thisAmount += 1.5;
                if ($this->getDaysRented() > 3) {
                    $thisAmount += ($this->getDaysRented() - 3) * 1.5;
                }
                break;
        }
        return $thisAmount;
    }


}