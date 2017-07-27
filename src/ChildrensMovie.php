<?php

namespace Mannion007\MartinFowlerRefactoring;

class ChildrensMovie extends Movie
{
    public function __construct(string $title)
    {
        parent::__construct($title, Movie::CHILDRENS);
    }
}
