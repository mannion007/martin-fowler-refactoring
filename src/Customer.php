<?php

namespace Mannion007\MartinFowlerRefactoring;

use Mannion007\MartinFowlerRefactoring\Statement\StatementProducerInterface;

class Customer
{
    private $name;
    private $rentals;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function addRental(Rental $rental) : void
    {
        $this->rentals[] = $rental;
    }

    public function getRentals() : array
    {
        return $this->rentals;
    }

    public function getTotalFrequentRenterPoints() : int
    {
        $frequentRenterPoints = 0;
        /** @var Rental $rental */
        foreach ($this->getRentals() as $rental) {
            $frequentRenterPoints += $rental->getFrequentRenterPoints();
        }
        return $frequentRenterPoints;
    }

    public function getTotalAmount() : float
    {
        $totalAmount = 0;
        /** @var Rental $rental */
        foreach ($this->getRentals() as $rental) {
            $totalAmount += $rental->getAmount();
        }
        return $totalAmount;
    }

    public function statement(StatementProducerInterface $statementGenerator) : string
    {
        return $statementGenerator->generateFor($this);
    }
}
