<?php

namespace Mannion007\MartinFowlerRefactoring;

abstract class AbstractMovie
{
    private $title;

    public function __construct($title)
    {
        $this->title = $title;
    }

    public static function createChildrens($title)
    {
        return new ChildrensMovie($title);
    }

    public static function createRegular($title)
    {
        return new RegularMovie($title);
    }

    public static function createNewRelease($title)
    {
        return new NewReleaseMovie($title);
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getFrequentRenterPoints(int $daysRented)
    {
        return 1;
    }
}
