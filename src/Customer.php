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

    public function getRentals()
    {
        return $this->rentals;
    }

    public function getTotalFrequentRenterPoints()
    {
        $frequentRenterPoints = 0;
        /** @var Rental $rental */
        foreach ($this->getRentals() as $rental) {
            $frequentRenterPoints += $rental->getFrequentRenterPoints();
        }
        return $frequentRenterPoints;
    }

    public function getTotalAmount()
    {
        $totalAmount = 0;
        /** @var Rental $rental */
        foreach ($this->getRentals() as $rental) {
            $totalAmount += $rental->getAmount();
        }
        return $totalAmount;
    }

    public function statement(StatementGeneratorInterface $statementGenerator)
    {
        return $statementGenerator->generateFor($this);
    }
}
