<?php

namespace Mannion007\MartinFowlerRefactoring;

class Customer
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var array Rental[]
     */
    private $rentals;

    /**
     * Customer constructor.
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    public function addRental(Rental $rental)
    {
        $this->rentals[] = $rental;
    }

    /**
     * @return Rental[]
     */
    private function getRentals()
    {
        return $this->rentals;
    }

    public function statement()
    {
        /** @var float $totalAmount */
        $totalAmount = 0;

        /** @var string $statement */
        $statement = "Rental Record for " . $this->getName() . "\n";

        foreach ($this->getRentals() as $rental) {
            $statement .= "\t" . $rental->getMovie()->getTitle() . "\t" . (string)$this->getAmountFor($rental) . "\n";
            $totalAmount += $this->getAmountFor($rental);
        }

        //add footer lines
        $statement .= "Amount owed is " . (string)$totalAmount . "\n";
        $statement .= "You earned " . (string)$this->getFrequentRenterPoints() . " frequent renter points";
        return $statement;
    }

    private function getAmountFor(Rental $rental)
    {
        $thisAmount = 0;
        switch ($rental->getMovie()->getPriceCode()) {
            case Movie::REGULAR:
                $thisAmount += 2;
                if ($rental->getDaysRented() > 2) {
                    $thisAmount += ($rental->getDaysRented() - 2) * 1.5;
                }
                break;
            case Movie::NEW_RELEASE:
                $thisAmount += $rental->getDaysRented() * 3;
                break;
            case Movie::CHILDRENS:
                $thisAmount += 1.5;
                if ($rental->getDaysRented() > 3) {
                    $thisAmount += ($rental->getDaysRented() - 3) * 1.5;
                }
                break;
        }
        return $thisAmount;
    }


    private function getFrequentRenterPoints()
    {
        /** @var int $frequentRenterPoints */
        $frequentRenterPoints = 0;

        /** @var Rental $rental */
        foreach ($this->getRentals() as $rental) {
            // add frequent renter points
            $frequentRenterPoints++;
            // add bonus for a two day new release rental
            if (($rental->getMovie()->getPriceCode() == Movie::NEW_RELEASE) && $rental->getDaysRented() > 1) {
                $frequentRenterPoints++;
            }
        }
        return $frequentRenterPoints;
    }
}