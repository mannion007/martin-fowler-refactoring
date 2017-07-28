<?php

namespace Mannion007\MartinFowlerRefactoring\Statement;

use Mannion007\MartinFowlerRefactoring\Customer;
use Mannion007\MartinFowlerRefactoring\Rental;

class PlainTextStatementProducer implements StatementProducerInterface
{
    public function produceFor(Customer $customer) : string
    {
        $statement = "Rental Record for " . $customer->getName() . "\n";

        /** @var Rental $rental */
        foreach ($customer->getRentals() as $rental) {
            $statement .= "\t" . $rental->getMovie()->getTitle() . "\t" . (string)$rental->getAmount() . "\n";
        }

        $statement .= "Amount owed is " . (string)$customer->getAmountOwed() . "\n";
        $statement .= "You earned " . (string)$customer->getTotalFrequentRenterPoints() . " frequent renter points";
        return $statement;
    }
}
