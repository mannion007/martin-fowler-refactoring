<?php

namespace Mannion007\MartinFowlerRefactoring;

class NewReleaseMovie extends Movie
{
    public function __construct(string $title)
    {
        parent::__construct($title, Movie::NEW_RELEASE);
    }
}
