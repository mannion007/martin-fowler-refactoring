<?php

use PHPUnit\Framework\TestCase;

use Mannion007\MartinFowlerRefactoring\Customer;
use Mannion007\MartinFowlerRefactoring\Rental;
use Mannion007\MartinFowlerRefactoring\Movie\RegularMovie;
use Mannion007\MartinFowlerRefactoring\Movie\NewReleaseMovie;
use Mannion007\MartinFowlerRefactoring\Movie\ChildrensMovie;
use Mannion007\MartinFowlerRefactoring\Statement\PlainTextStatementProducer;

final class CustomerTest extends TestCase
{
    public function testStatementForSingleRegularMovieForOneDay()
    {
        $customer = new Customer('Bert Sampson');
        $customer->addRental(new Rental(new RegularMovie('Some Regular Movie'), 1));
        $this->assertSame("Rental Record for Bert Sampson\n\tSome Regular Movie\t2\nAmount owed is 2\nYou earned 1 frequent renter points", $customer->statement(new PlainTextStatementProducer()));
    }

    public function testStatementForSingleRegularMovieForMultipleDays()
    {
        $customer = new Customer('Bert Sampson');
        $customer->addRental(new Rental(new RegularMovie('Some Regular Movie'), 5));
        $this->assertSame("Rental Record for Bert Sampson\n\tSome Regular Movie\t6.5\nAmount owed is 6.5\nYou earned 1 frequent renter points", $customer->statement(new PlainTextStatementProducer()));
    }

    public function testStatementForMultipleRegularMoviesForOneDay()
    {
        $customer = new Customer('Bert Sampson');
        $customer->addRental(new Rental(new RegularMovie('Some Regular Movie'), 1));
        $customer->addRental(new Rental(new RegularMovie('Another Regular Movie'), 1));
        $this->assertSame("Rental Record for Bert Sampson\n\tSome Regular Movie\t2\n\tAnother Regular Movie\t2\nAmount owed is 4\nYou earned 2 frequent renter points", $customer->statement(new PlainTextStatementProducer()));
    }

    public function testStatementForMultipleRegularMoviesForMultipleDays()
    {
        $customer = new Customer('Bert Sampson');
        $customer->addRental(new Rental(new RegularMovie('Some Regular Movie'), 5));
        $customer->addRental(new Rental(new RegularMovie('Another Regular Movie'), 6));
        $this->assertSame("Rental Record for Bert Sampson\n\tSome Regular Movie\t6.5\n\tAnother Regular Movie\t8\nAmount owed is 14.5\nYou earned 2 frequent renter points", $customer->statement(new PlainTextStatementProducer()));
    }

    public function testStatementForSingleNewReleaseMovieForOneDay()
    {
        $customer = new Customer('Bert Sampson');
        $customer->addRental(new Rental(new NewReleaseMovie('Some New Release Movie'), 1));
        $this->assertSame("Rental Record for Bert Sampson\n\tSome New Release Movie\t3\nAmount owed is 3\nYou earned 1 frequent renter points", $customer->statement(new PlainTextStatementProducer()));
    }

    public function testStatementForSingleNewReleaseMovieForMultipleDays()
    {
        $customer = new Customer('Bert Sampson');
        $customer->addRental(new Rental(new NewReleaseMovie('Some New Release Movie'), 5));
        $this->assertSame("Rental Record for Bert Sampson\n\tSome New Release Movie\t15\nAmount owed is 15\nYou earned 2 frequent renter points", $customer->statement(new PlainTextStatementProducer()));
    }

    public function testStatementForMultipleNewReleaseMovieForOneDay()
    {
        $customer = new Customer('Bert Sampson');
        $customer->addRental(new Rental(new NewReleaseMovie('Some New Release Movie'), 1));
        $customer->addRental(new Rental(new NewReleaseMovie('Another New Release Movie'), 1));
        $this->assertSame("Rental Record for Bert Sampson\n\tSome New Release Movie\t3\n\tAnother New Release Movie\t3\nAmount owed is 6\nYou earned 2 frequent renter points", $customer->statement(new PlainTextStatementProducer()));
    }

    public function testStatementForMultipleNewReleaseMovieForMultipleDays()
    {
        $customer = new Customer('Bert Sampson');
        $customer->addRental(new Rental(new NewReleaseMovie('Some New Release Movie'), 5));
        $customer->addRental(new Rental(new NewReleaseMovie('Another New Release Movie'), 5));
        $this->assertSame("Rental Record for Bert Sampson\n\tSome New Release Movie\t15\n\tAnother New Release Movie\t15\nAmount owed is 30\nYou earned 4 frequent renter points", $customer->statement(new PlainTextStatementProducer()));
    }

    public function testStatementForSingleChildrenRentalForOneDay()
    {
        $customer = new Customer('Bert Sampson');
        $customer->addRental(new Rental(new ChildrensMovie("Some Children's Movie"), 1));
        $this->assertSame("Rental Record for Bert Sampson\n\tSome Children's Movie\t1.5\nAmount owed is 1.5\nYou earned 1 frequent renter points", $customer->statement(new PlainTextStatementProducer()));
    }

    public function testStatementForSingleChildrenRentalForMultipleDays()
    {
        $customer = new Customer('Bert Sampson');
        $customer->addRental(new Rental(new ChildrensMovie("Some Children's Movie"), 5));
        $this->assertSame("Rental Record for Bert Sampson\n\tSome Children's Movie\t4.5\nAmount owed is 4.5\nYou earned 1 frequent renter points", $customer->statement(new PlainTextStatementProducer()));
    }

    public function testStatementForMultipleChildrenRentalForOneDay()
    {
        $customer = new Customer('Bert Sampson');
        $customer->addRental(new Rental(new ChildrensMovie("Some Children's Movie"), 1));
        $customer->addRental(new Rental(new ChildrensMovie("Another Children's Movie"), 1));
        $this->assertSame("Rental Record for Bert Sampson\n\tSome Children's Movie\t1.5\n\tAnother Children's Movie\t1.5\nAmount owed is 3\nYou earned 2 frequent renter points", $customer->statement(new PlainTextStatementProducer()));
    }

    public function testStatementForMultipleChildrenRentalForMultipleDays()
    {
        $customer = new Customer('Bert Sampson');
        $customer->addRental(new Rental(new ChildrensMovie("Some Children's Movie"), 5));
        $customer->addRental(new Rental(new ChildrensMovie("Another Children's Movie"), 5));
        $this->assertSame("Rental Record for Bert Sampson\n\tSome Children's Movie\t4.5\n\tAnother Children's Movie\t4.5\nAmount owed is 9\nYou earned 2 frequent renter points", $customer->statement(new PlainTextStatementProducer()));
    }

    public function testStatementForACombinationOfRentalsForOneDay()
    {
        $customer = new Customer('Bert Sampson');
        $customer->addRental(new Rental(new RegularMovie('Some Regular Movie'), 1));
        $customer->addRental(new Rental(new NewReleaseMovie('Some New Release Movie'), 1));
        $customer->addRental(new Rental(new ChildrensMovie("Some Children's Movie"), 1));
        $this->assertSame("Rental Record for Bert Sampson\n\tSome Regular Movie\t2\n\tSome New Release Movie\t3\n\tSome Children's Movie\t1.5\nAmount owed is 6.5\nYou earned 3 frequent renter points", $customer->statement(new PlainTextStatementProducer()));
    }

    public function testStatementForACombinationOfRentalsForMultipleDays()
    {
        $customer = new Customer('Bert Sampson');
        $customer->addRental(new Rental(new RegularMovie('Some Regular Movie'), 10));
        $customer->addRental(new Rental(new NewReleaseMovie('Some New Release Movie'), 10));
        $customer->addRental(new Rental(new ChildrensMovie("Some Children's Movie"), 10));
        $this->assertSame("Rental Record for Bert Sampson\n\tSome Regular Movie\t14\n\tSome New Release Movie\t30\n\tSome Children's Movie\t12\nAmount owed is 56\nYou earned 4 frequent renter points", $customer->statement(new PlainTextStatementProducer()));
    }
}
