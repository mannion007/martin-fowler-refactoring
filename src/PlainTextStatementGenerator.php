<?php

namespace Mannion007\MartinFowlerRefactoring;

class PlainTextStatementGenerator implements StatementGeneratorInterface
{
    public function generateFor(Customer $customer)
    {
        $statement = "Rental Record for " . $customer->getName() . "\n";

        /** @var Rental $rental */
        foreach ($customer->getRentals() as $rental) {
            $statement .= "\t" . $rental->getMovie()->getTitle() . "\t" . (string)$rental->getAmount() . "\n";
        }

        $statement .= "Amount owed is " . (string)$customer->getTotalAmount() . "\n";
        $statement .= "You earned " . (string)$customer->getTotalFrequentRenterPoints() . " frequent renter points";
        return $statement;
    }
}
