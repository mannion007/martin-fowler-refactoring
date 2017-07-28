<?php

namespace Mannion007\MartinFowlerRefactoring\Statement;

use Mannion007\MartinFowlerRefactoring\Customer;

interface StatementProducerInterface
{
    public function produceFor(Customer $customer);
}
