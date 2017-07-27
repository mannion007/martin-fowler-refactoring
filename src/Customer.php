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

    public function statement()
    {
        /** @var float $totalAmount */
        $totalAmount = 0;

        /** @var int $frequentRenterPoints */
        $frequentRenterPoints = 0;

        /** @var array $rentals */
        $rentals = $this->rentals;

        /** @var string $result */
        $result = "Rental Record for " . $this->getName() . "\n";

        /** @var Rental $rental */
        foreach ($rentals as $rental) {
            $thisAmount = $this->getAmountFor($rental);

            // add frequent renter points
            $frequentRenterPoints++;
            // add bonus for a two day new release rental
            if (($rental->getMovie()->getPriceCode() == Movie::NEW_RELEASE) && $rental->getDaysRented() > 1) {
                $frequentRenterPoints++;
            }
            //show figures for this rental
            $result .= "\t" . $rental->getMovie()->getTitle() . "\t" . (string)$thisAmount . "\n";
            $totalAmount += $thisAmount;
        }

        //add footer lines
        $result .= "Amount owed is " . (string)$totalAmount . "\n";
        $result .= "You earned " . (string)$frequentRenterPoints . " frequent renter points";
        return $result;
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
}