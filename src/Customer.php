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
            $statement .= "\t" . $rental->getMovie()->getTitle() . "\t" . (string)$rental->getAmount() . "\n";
            $totalAmount += $rental->getAmount();
        }

        //add footer lines
        $statement .= "Amount owed is " . (string)$totalAmount . "\n";
        $statement .= "You earned " . (string)$this->getFrequentRenterPoints() . " frequent renter points";
        return $statement;
    }

    private function getFrequentRenterPoints()
    {
        /** @var int $frequentRenterPoints */
        $frequentRenterPoints = 0;

        /** @var Rental $rental */
        foreach ($this->getRentals() as $rental) {
            $frequentRenterPoints += $rental->getFrequentRenterPoints();
        }
        return $frequentRenterPoints;
    }
}
