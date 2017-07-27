<?php

namespace Mannion007\MartinFowlerRefactoring;

abstract class Movie
{
    /**
     * @var string
     */
    private $title;

    /**
     * Movie constructor.
     * @param string $title
     */
    public function __construct($title)
    {
        $this->title = $title;
    }

    public static function childrens($title)
    {
        return new ChildrensMovie($title);
    }

    public static function regular($title)
    {
        return new RegularMovie($title);
    }

    public static function newRelease($title)
    {
        return new NewReleaseMovie($title);
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    abstract public function getAmount(int $daysRented);

    public function getFrequentRenterPoints(int $daysRented)
    {
        return 1;
    }
}
