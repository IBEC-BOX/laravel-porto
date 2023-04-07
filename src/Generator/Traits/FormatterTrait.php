<?php

namespace AdminKit\Porto\Generator\Traits;

trait FormatterTrait
{
    public function capitalize($word): string
    {
        return ucfirst($word);
    }

    protected function trimString($string): string
    {
        return trim($string);
    }
}
