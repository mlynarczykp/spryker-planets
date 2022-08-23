<?php

namespace Pyz\Zed\HelloPawel\Business\Reverser;

class StringReverser
{
    /**
     * @param string $stringToReverse
     *
     * @return string
     */
    public function reverseString(string $stringToReverse): string
    {
        return strrev($stringToReverse);
    }
}
