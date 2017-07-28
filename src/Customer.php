<?php

namespace Mannion007\MartinFowlerRefactoring;

class Customer
{
    private $name;
    private $rentals;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function addRental(Rental $rental)
    {
        $this->rentals[] = $rental;
    }

    private function getRentals()
    {
        return $this->rentals;
    }

    private function getTotalFrequentRenterPoints()
    {
        $frequentRenterPoints = 0;
        /** @var Rental $rental */
        foreach ($this->getRentals() as $rental) {
            $frequentRenterPoints += $rental->getFrequentRenterPoints();
        }
        return $frequentRenterPoints;
    }

    private function getTotalAmount()
    {
        $totalAmount = 0;
        /** @var Rental $rental */
        foreach ($this->getRentals() as $rental) {
            $totalAmount += $rental->getAmount();
        }
        return $totalAmount;
    }

    public function statement()
    {
        $statement = "Rental Record for " . $this->getName() . "\n";

        /** @var Rental $rental */
        foreach ($this->getRentals() as $rental) {
            $statement .= "\t" . $rental->getMovie()->getTitle() . "\t" . (string)$rental->getAmount() . "\n";
        }

        $statement .= "Amount owed is " . (string)$this->getTotalAmount() . "\n";
        $statement .= "You earned " . (string)$this->getTotalFrequentRenterPoints() . " frequent renter points";
        return $statement;
    }
}
