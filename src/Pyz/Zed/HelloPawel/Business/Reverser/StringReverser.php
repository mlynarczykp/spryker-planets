<?php

namespace Pyz\Zed\HelloPawel\Business\Reverser;

use Generated\Shared\Transfer\HelloPawelTransfer;

class StringReverser
{
    /**
     * @param \Generated\Shared\Transfer\HelloPawelTransfer $helloPawelTransfer
     *
     * @return \Generated\Shared\Transfer\HelloPawelTransfer
     */
    public function reverseString(HelloPawelTransfer $helloPawelTransfer): HelloPawelTransfer
    {
        $reversedString = strrev($helloPawelTransfer->getOriginalString());
        $helloPawelTransfer->setReversedString($reversedString);

        return $helloPawelTransfer;
    }
}
