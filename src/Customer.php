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

    private function getTotalFrequentRenterPoints()
    {
        /** @var int $frequentRenterPoints */
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
        foreach ($this->getRentals() as $rental) {
            $totalAmount += $rental->getAmount();
        }
        return $totalAmount;
    }

    public function statement()
    {
        /** @var string $statement */
        $statement = "Rental Record for " . $this->getName() . "\n";

        foreach ($this->getRentals() as $rental) {
            $statement .= "\t" . $rental->getMovie()->getTitle() . "\t" . (string)$rental->getAmount() . "\n";
        }

        //add footer lines
        $statement .= "Amount owed is " . (string)$this->getTotalAmount() . "\n";
        $statement .= "You earned " . (string)$this->getTotalFrequentRenterPoints() . " frequent renter points";
        return $statement;
    }
}
