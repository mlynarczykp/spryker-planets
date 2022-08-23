<?php

namespace Pyz\Zed\HelloPawel\Business\Reverser;

interface StringReverserInterface
{
    /**
     * @param string $stringToReverse
     *
     * @return string
     */
    public function reverseString(string $stringToReverse): string;
}
