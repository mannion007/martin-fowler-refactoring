<?php

namespace Mannion007\MartinFowlerRefactoring\Statement;

use Mannion007\MartinFowlerRefactoring\Customer;

class HtmlStatementProducer implements StatementProducerInterface
{
    public function produceFor(Customer $customer) : string
    {
        $statement = "<html>";
        $statement .= "<h1>Rental Record for " . $customer->getName() . "</h1>";

        /** @var Rental $rental */
        foreach ($customer->getRentals() as $rental) {
            $statement .= "<p>" . $rental->getMovie()->getTitle() . " = " . (string)$rental->getAmount() . "</p>";
        }

        $statement .= "<p><strong>Amount owed is " . (string)$customer->getAmountOwed() . "</strong></p>";
        $statement .= "<p><strong>You earned " . (string)$customer->getTotalFrequentRenterPoints() . " frequent renter points</strong></p>";
        $statement .= "</html>";
        return $statement;
    }
}