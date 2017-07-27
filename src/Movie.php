<?php

namespace Mannion007\MartinFowlerRefactoring;

abstract class Movie
{
    const CHILDRENS = 2;
    const REGULAR = 0;
    const NEW_RELEASE = 1;

    /**
     * @var string
     */
    private $title;

    /**
     * @var int
     */
    private $priceCode;

    /**
     * Movie constructor.
     * @param string $title
     * @param int $priceCode
     */
    public function __construct($title, $priceCode)
    {
        $this->title = $title;
        $this->priceCode = $priceCode;
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
     * @return int
     */
    public function getPriceCode()
    {
        return $this->priceCode;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
}
