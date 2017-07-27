<?php

namespace Mannion007\MartinFowlerRefactoring;

class RegularMovie extends Movie
{
    public function __construct(string $title)
    {
        parent::__construct($title, Movie::REGULAR);
    }
}
